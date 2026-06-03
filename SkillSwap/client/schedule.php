<?php
global $pdo;
include '../includes/db.php';
include '../includes/header.php';

$currentUserId = $_SESSION['user_id'] ?? 1;
$error = "";

try {
    $pdo->exec("ALTER TABLE sessions ADD session_time VARCHAR(20)");
} catch (PDOException $e) {
    // column already exists
}

$requestId = $_GET['requestId'] ?? null;

if ($requestId === null) {
    $firstRequestStmt = $pdo->query("
        SELECT request_id
        FROM requests
        ORDER BY request_id DESC
        LIMIT 1
    ");
    $firstRequest = $firstRequestStmt->fetch(PDO::FETCH_ASSOC);
    $requestId = $firstRequest['request_id'] ?? null;
}

$detailsStmt = $pdo->prepare("
    SELECT 
        r.request_id,
        r.user_id AS learner_id,
        r.title AS skill_title,
        r.session_type,
        learner.full_name AS learner_name
    FROM requests r
    LEFT JOIN users learner ON r.user_id = learner.user_id
    WHERE r.request_id = ?
    LIMIT 1
");
$detailsStmt->execute([$requestId]);
$details = $detailsStmt->fetch(PDO::FETCH_ASSOC);

if (!$details) {
    die("No request found. Please create a request first.");
}

$learnerId = $details['learner_id'];

function getEndTimePHP($time) {
    return date("h:i A", strtotime($time . " +1 hour"));
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['complete_session'])) {

    // Get the session first so we know the mentor
    $sessionStmt = $pdo->prepare("
        SELECT session_id, mentor_id
        FROM sessions
        WHERE request_id = ?
        ORDER BY session_id DESC
        LIMIT 1
    ");
    $sessionStmt->execute([$requestId]);
    $completedSession = $sessionStmt->fetch(PDO::FETCH_ASSOC);

    if ($completedSession) {

        // Mark session as completed
        $stmt = $pdo->prepare("
            UPDATE sessions
            SET status = 'completed'
            WHERE session_id = ?
        ");
        $stmt->execute([$completedSession['session_id']]);

        // Add 1 volunteer hour as approved
        $insertHour = $pdo->prepare("
            INSERT INTO volunteer_hours (mentor_id, hours_completed, approved)
            VALUES (?, 1, 'approved')
        ");
        $insertHour->execute([$completedSession['mentor_id']]);
    }

    header("Location: volunteer-hours.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['propose_time'])) {
    $sessionDate = $_POST['session_date'] ?? "";
    $sessionTime = $_POST['session_time'] ?? "";

    if (!empty($sessionDate) && !empty($sessionTime)) {

        if (date("D", strtotime($sessionDate)) == "Mon") {
            $error = "Monday is a holiday. Please select another day.";
        } else {

            $checkStmt = $pdo->prepare("
                SELECT session_id
                FROM sessions
                WHERE request_id = ?
                ORDER BY session_id DESC
                LIMIT 1
            ");
            $checkStmt->execute([$requestId]);
            $existingSession = $checkStmt->fetch(PDO::FETCH_ASSOC);

            if ($existingSession) {
                $stmt = $pdo->prepare("
                    UPDATE sessions
                    SET session_date = ?,
                        session_time = ?,
                        mentor_id = ?,
                        student_id = ?,
                        status = 'confirmed'
                    WHERE session_id = ?
                ");
                $stmt->execute([
                        $sessionDate,
                        $sessionTime,
                        $currentUserId,
                        $learnerId,
                        $existingSession['session_id']
                ]);
            } else {
                $stmt = $pdo->prepare("
                    INSERT INTO sessions
                    (mentor_id, student_id, request_id, session_date, session_time, status)
                    VALUES
                    (?, ?, ?, ?, ?, 'confirmed')
                ");
                $stmt->execute([
                        $currentUserId,
                        $learnerId,
                        $requestId,
                        $sessionDate,
                        $sessionTime
                ]);
            }

            header("Location: schedule.php?requestId=" . $requestId);
            exit;
        }

    } else {
        $error = "Please select a time first.";
    }
}

$stmt = $pdo->prepare("
    SELECT 
        s.session_date,
        s.session_time,
        s.status,
        mentor.full_name AS mentor_name
    FROM sessions s
    LEFT JOIN users mentor ON s.mentor_id = mentor.user_id
    WHERE s.request_id = ?
    ORDER BY s.session_id DESC
    LIMIT 1
");
$stmt->execute([$requestId]);
$session = $stmt->fetch(PDO::FETCH_ASSOC);

$dates = [
        "2026-05-31",
        "2026-06-01",
        "2026-06-02",
        "2026-06-03",
        "2026-06-04",
        "2026-06-05",
        "2026-06-06"
];

$times = [
        "09:00 AM",
        "10:00 AM",
        "11:00 AM",
        "12:00 PM",
        "01:00 PM",
        "02:00 PM",
        "03:00 PM",
        "04:00 PM",
        "05:00 PM",
        "06:00 PM",
        "07:00 PM",
        "08:00 PM"
];
?>

    <link rel="stylesheet" href="../assets/css/schedule.css">

    <main class="schedule-page">

        <section class="schedule-title">
            <h2>Schedule Session</h2>
            <p>
                Coordinate a time for your
                <?php echo htmlspecialchars($details['skill_title']); ?>
                session
            </p>
        </section>

        <?php if ($error != "") { ?>
            <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php } ?>

        <section class="schedule-layout">

            <div class="schedule-left-card">

                <div class="schedule-card-header">
                    <h3>
                    <span class="calendar-icon">
                        <svg viewBox="0 0 24 24" fill="none">
                            <rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="2"/>
                            <path d="M16 3V7" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M8 3V7" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M3 10H21" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </span>
                        Select Date & Time
                    </h3>

                    <div class="week-control">
                        <button type="button">‹</button>
                        <span>May 31 - Jun 6, 2026</span>
                        <button type="button">›</button>
                    </div>
                </div>

                <div class="calendar-scroll">

                    <div class="calendar-grid calendar-days">
                        <div class="time-column-head"></div>

                        <?php foreach ($dates as $date) { ?>
                            <div class="day-head">
                                <span><?php echo date("D", strtotime($date)); ?></span>
                                <strong><?php echo date("j", strtotime($date)); ?></strong>
                            </div>
                        <?php } ?>
                    </div>

                    <?php foreach ($times as $time) { ?>
                        <div class="calendar-grid">

                            <div class="time-label"><?php echo $time; ?></div>

                            <?php foreach ($dates as $date) {
                                $isMonday = date("D", strtotime($date)) == "Mon";

                                $isBooked =
                                        $session &&
                                        $session['status'] != 'completed' &&
                                        $session['session_date'] == $date &&
                                        $session['session_time'] == $time;
                                ?>

                                <?php if ($isMonday) { ?>

                                    <button
                                            type="button"
                                            class="time-slot holiday-slot"
                                            disabled
                                    ></button>

                                <?php } else { ?>

                                    <button
                                            type="button"
                                            class="time-slot <?php echo $isBooked ? 'booked-slot' : ''; ?>"
                                            onclick="selectTime('<?php echo $date; ?>', '<?php echo $time; ?>', this)"
                                    >
                                        <?php echo $isBooked ? 'Booked' : ''; ?>
                                    </button>

                                <?php } ?>

                            <?php } ?>

                        </div>
                    <?php } ?>

                </div>

                <form method="POST" class="selected-time-box" id="selectedTimeBox">

                    <input type="hidden" id="selectedDate" name="session_date">
                    <input type="hidden" id="selectedTime" name="session_time">
                    <input type="hidden" name="propose_time" value="1">

                    <div>
                        <h4>Selected Time:</h4>
                        <p id="selectedTimeText"></p>
                    </div>

                    <button type="submit" class="propose-btn">
                        + Propose Time
                    </button>

                </form>

            </div>

            <aside class="schedule-sidebar">

                <section class="side-card">
                    <h3>Session Details</h3>

                    <div class="detail-item">
                        <span>Skill</span>
                        <strong><?php echo htmlspecialchars($details['skill_title']); ?></strong>
                    </div>

                    <div class="detail-item">
                        <span>Learner</span>
                        <strong><?php echo htmlspecialchars($details['learner_name']); ?></strong>
                    </div>

                    <div class="detail-item">
                        <span>Mentor</span>
                        <strong><?php echo htmlspecialchars($session['mentor_name'] ?? 'Not assigned yet'); ?></strong>
                    </div>

                    <div class="detail-item">
                        <span>Session Type</span>
                        <strong class="type-pill">
                            <?php echo htmlspecialchars($details['session_type'] ?? 'one-on-one'); ?>
                        </strong>
                    </div>
                </section>

                <section class="side-card">
                    <h3>Session Status</h3>

                    <?php if (!$session || $session['status'] == 'completed') { ?>

                        <p class="empty-status">No sessions scheduled yet</p>

                    <?php } else { ?>

                        <div class="completed-question-box">

                            <div class="session-info-line">
                                <span>📅</span>
                                <p><?php echo date("D, M j", strtotime($session['session_date'])); ?></p>
                            </div>

                            <div class="session-info-line">
                                <span>🕘</span>
                                <p>
                                    <?php echo htmlspecialchars($session['session_time']); ?>
                                    -
                                    <?php echo htmlspecialchars(getEndTimePHP($session['session_time'])); ?>
                                </p>
                            </div>

                            <div class="session-info-line">
                                <span>📍</span>
                                <p>Microsoft Teams (link will be shared)</p>
                            </div>

                            <h4>Have you completed your session?</h4>

                            <form method="POST">
                                <input type="hidden" name="complete_session" value="1">

                                <button type="submit" class="completed-btn">
                                    ✓ Completed
                                </button>
                            </form>

                        </div>

                    <?php } ?>
                </section>

            </aside>

        </section>

    </main>

    <script>
        function selectTime(date, time, button) {
            document.getElementById("selectedDate").value = date;
            document.getElementById("selectedTime").value = time;

            const formattedDate = new Date(date).toLocaleDateString("en-US", {
                weekday: "long",
                month: "long",
                day: "numeric",
                year: "numeric"
            });

            document.getElementById("selectedTimeText").innerText =
                formattedDate + "\n" + time + " - " + getEndTime(time);

            document.getElementById("selectedTimeBox").style.display = "flex";

            document.querySelectorAll(".time-slot").forEach(btn => {
                btn.classList.remove("selected-slot");
            });

            button.classList.add("selected-slot");
        }

        function getEndTime(time) {
            const parts = time.split(" ");
            let hour = parseInt(parts[0].split(":")[0]);
            const period = parts[1];

            hour++;

            if (hour === 12) {
                return "12:00 " + (period === "AM" ? "PM" : "AM");
            }

            if (hour > 12) {
                hour = 1;
            }

            return String(hour).padStart(2, "0") + ":00 " + period;
        }
    </script>

<?php include '../includes/footer.php'; ?>