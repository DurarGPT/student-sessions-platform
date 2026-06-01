<?php
include '../includes/db.php';
include '../includes/header.php';
?>

    <link rel="stylesheet" href="../assets/css/client_style.css">

<?php
/* رقم الطلب الحالي */
$requestId = $_GET['requestId'] ?? 1;

$message = "";
$error = "";

/* إضافة عمود الوقت إذا لم يكن موجوداً */
try {
    $pdo->exec("
        ALTER TABLE sessions
        ADD session_time VARCHAR(20)
    ");
} catch (PDOException $e) {
    // العمود موجود مسبقاً
}

/* حفظ أو تحديث الموعد المقترح */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sessionDate = $_POST['session_date'] ?? "";
    $sessionTime = $_POST['session_time'] ?? "";

    /* التأكد من أن المستخدم اختار موعداً */
    if (!empty($sessionDate) && !empty($sessionTime)) {

        /* البحث عن جلسة موجودة مسبقاً لنفس الطلب */
        $checkStmt = $pdo->prepare("
            SELECT session_id
            FROM sessions
            WHERE request_id = ?
            ORDER BY session_id DESC
            LIMIT 1
        ");

        $checkStmt->execute([$requestId]);
        $existingSession = $checkStmt->fetch(PDO::FETCH_ASSOC);

        /* إذا كانت الجلسة موجودة، يتم تحديث الموعد */
        if ($existingSession) {
            $stmt = $pdo->prepare("
                UPDATE sessions
                SET session_date = ?,
                    session_time = ?,
                    status = 'confirmed'
                WHERE session_id = ?
            ");

            $stmt->execute([
                    $sessionDate,
                    $sessionTime,
                    $existingSession['session_id']
            ]);
        } else {

            /* إذا لم توجد جلسة، يتم إنشاء جلسة جديدة */
            $stmt = $pdo->prepare("
                INSERT INTO sessions
                (mentor_id, student_id, request_id, session_date, session_time, status)
                VALUES
                (1, 1, ?, ?, ?, 'confirmed')
            ");

            $stmt->execute([
                    $requestId,
                    $sessionDate,
                    $sessionTime
            ]);
        }

        $message = "Session time confirmed successfully!";

    } else {
        $error = "Please select a time first.";
    }
}

/* جلب آخر حالة للموعد */
$stmt = $pdo->prepare("
    SELECT session_date, session_time, status
    FROM sessions
    WHERE request_id = ?
    ORDER BY session_id DESC
    LIMIT 1
");

$stmt->execute([$requestId]);
$session = $stmt->fetch(PDO::FETCH_ASSOC);
?>

    <main class="schedule-page">

    <section class="schedule-hero">
        <h2>Schedule Session</h2>
        <p>Choose a suitable time for your mentoring session</p>

        <?php if($message != "") { ?>
            <div class="success-message">
                <?php echo $message; ?>
            </div>
        <?php } ?>

        <?php if($error != "") { ?>
            <div class="error-message">
                <?php echo $error; ?>
            </div>
        <?php } ?>
    </section>

    <section class="schedule-card">
        <div class="schedule-header">
            <h3>Select Date & Time</h3>
            <p>May 10 - May 16, 2026</p>
        </div>

        <table class="schedule-table">
            <tr>
                <th>Sun<br>10</th>
                <th>Mon<br>11</th>
                <th>Tue<br>12</th>
                <th>Wed<br>13</th>
                <th>Thu<br>14</th>
                <th>Fri<br>15</th>
                <th>Sat<br>16</th>
            </tr>

<?php
$dates = [
        "2026-05-10",
        "2026-05-11",
        "2026-05-12",
        "2026-05-13",
        "2026-05-14",
        "2026-05-15",
        "2026-05-16"
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

foreach($times as $time) {
    echo "<tr>";foreach($dates as $date) {
        echo "
                        <td>
                            <button
                                type='button'
                                class='time-slot-btn'
                                onclick=\"selectTime('$date', '$time', this)\"
                            >
                                $time
                            </button>
                        </td>
                    ";
    }

    echo "</tr>";
}
?>
        </table>

        <form method="POST" class="propose-time-form">
            <input type="hidden" id="selectedDate" name="session_date">
            <input type="hidden" id="selectedTime" name="session_time">

            <p class="selected-time-text">
                Selected Time:
                <strong id="selectedTimeText">No time selected</strong>
            </p>

            <button type="submit" class="blue-button">
                Propose Time
            </button>
        </form>
    </section>

        <section class="session-details-card">
            <h3>Session Details</h3>

            <div class="details-grid">
                <div>
                    <p>Skill</p>
                    <strong>Public Speaking</strong>
                </div>

                <div>
                    <p>Learner</p>
                    <strong>James Wilson</strong>
                </div>

                <div>
                    <p>Mentor</p>
                    <strong>Emma Johnson</strong>
                </div>

                <div>
                    <p>Type</p>
                    <strong>One-on-One</strong>
                </div>
            </div>
        </section>

        <section class="session-status-card">
            <h3>Session Status</h3>

            <?php if($session) { ?>
                <div class="scheduled-session">
                    <p>
                        Confirmed session on
                        <strong><?php echo htmlspecialchars($session['session_date']); ?></strong>
                    </p>

                    <p>
                        Time:
                        <strong><?php echo htmlspecialchars($session['session_time']); ?></strong>
                    </p>

                    <span class="session-badge">
                    <?php echo htmlspecialchars($session['status']); ?>
                </span>
                </div>
            <?php } else { ?>
                <p class="no-session">
                    No sessions scheduled yet
                </p>
            <?php } ?>
        </section>

    </main>

    <script>
        /* اختيار الوقت من الجدول */
        function selectTime(date, time, button) {
            document.getElementById("selectedDate").value = date;
            document.getElementById("selectedTime").value = time;
            document.getElementById("selectedTimeText").innerText = date + " at " + time;

            /* إزالة التحديد من جميع الأوقات */
            const buttons = document.querySelectorAll(".time-slot-btn");
            buttons.forEach(btn => btn.classList.remove("selected-slot"));

            /* تمييز الوقت المختار */
            button.classList.add("selected-slot");
        }
    </script>

    <script src="../assets/js/script.js"></script>

<?php include '../includes/footer.php'; ?>