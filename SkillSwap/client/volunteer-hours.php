<!-- Durar's Part -->

<?php
session_start();
include '../includes/db.php';

/* If user is not logged in, send them to login */
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

/* Logged-in user ID */
$userId = $_SESSION['user_id'];

/* ================= SUBMIT HOURS LOGIC ================= */
/* When mentor clicks Submit Hours for an active session */
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit_hours'])) {

    $sessionId = $_POST['session_id'];

    /* Make sure this session belongs to this mentor */
    $checkSession = $pdo->prepare("
        SELECT * FROM sessions
        WHERE session_id = ? AND mentor_id = ?
    ");
    $checkSession->execute([$sessionId, $userId]);
    $session = $checkSession->fetch(PDO::FETCH_ASSOC);

    if ($session) {

        /* Add 1 hour as pending approval */
        $insertHours = $pdo->prepare("
            INSERT INTO volunteer_hours (mentor_id, hours_completed, approved)
            VALUES (?, 1, 'pending')
        ");
        $insertHours->execute([$userId]);

        /* Mark session as completed so it disappears from active sessions */
        $updateSession = $pdo->prepare("
            UPDATE sessions
            SET status = 'completed'
            WHERE session_id = ?
        ");
        $updateSession->execute([$sessionId]);
    }

    header("Location: volunteer-hours.php");
    exit();
}

/* ================= SUMMARY CALCULATIONS ================= */

/* Approved volunteer hours */
$approvedStmt = $pdo->prepare("
    SELECT COALESCE(SUM(hours_completed), 0)
    FROM volunteer_hours
    WHERE mentor_id = ? AND approved = 'approved'
");
$approvedStmt->execute([$userId]);
$approvedHours = $approvedStmt->fetchColumn();

/* Pending volunteer hours */
$pendingStmt = $pdo->prepare("
    SELECT COALESCE(SUM(hours_completed), 0)
    FROM volunteer_hours
    WHERE mentor_id = ? AND approved = 'pending'
");
$pendingStmt->execute([$userId]);
$pendingHours = $pendingStmt->fetchColumn();

/* Completed approved sessions */
$completedStmt = $pdo->prepare("
    SELECT COUNT(*)
    FROM volunteer_hours
    WHERE mentor_id = ? AND approved = 'approved'
");
$completedStmt->execute([$userId]);
$completedSessions = $completedStmt->fetchColumn();

/* Active sessions ready to submit */
$activeStmt = $pdo->prepare("
    SELECT sessions.*, users.full_name AS learner_name
    FROM sessions
    LEFT JOIN users ON sessions.student_id = users.user_id
    WHERE sessions.mentor_id = ? AND sessions.status = 'accepted'
");
$activeStmt->execute([$userId]);
$activeSessions = $activeStmt->fetchAll(PDO::FETCH_ASSOC);

$activeCount = count($activeSessions);

/* Pending approval list */
$pendingListStmt = $pdo->prepare("
    SELECT *
    FROM volunteer_hours
    WHERE mentor_id = ? AND approved = 'pending'
    ORDER BY submitted_at DESC
");
$pendingListStmt->execute([$userId]);
$pendingList = $pendingListStmt->fetchAll(PDO::FETCH_ASSOC);

/* Approved sessions list */
$approvedListStmt = $pdo->prepare("
    SELECT *
    FROM volunteer_hours
    WHERE mentor_id = ? AND approved = 'approved'
    ORDER BY submitted_at DESC
");
$approvedListStmt->execute([$userId]);
$approvedList = $approvedListStmt->fetchAll(PDO::FETCH_ASSOC);

/* Monthly approved hours */
$monthStmt = $pdo->prepare("
    SELECT MONTH(submitted_at) AS month_number, COALESCE(SUM(hours_completed), 0) AS total_hours
    FROM volunteer_hours
    WHERE mentor_id = ? AND approved = 'approved'
    GROUP BY MONTH(submitted_at)
");
$monthStmt->execute([$userId]);
$monthRows = $monthStmt->fetchAll(PDO::FETCH_ASSOC);

/* Default months */
$months = [
        1 => 0,
        2 => 0,
        3 => 0,
        4 => 0,
        5 => 0
];

/* Fill months with database values */
foreach ($monthRows as $row) {
    if (isset($months[$row['month_number']])) {
        $months[$row['month_number']] = $row['total_hours'];
    }
}

/* Progress goal */
$goal = 100;
$progressPercent = min(($approvedHours / $goal) * 100, 100);
$remainingHours = max($goal - $approvedHours, 0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillSwap | Volunteer Hours</title>
    <link rel="stylesheet" href="../assets/css/client_style.css">
</head>

<body class="volunteer-page">

<?php include '../includes/header.php'; ?>

<main class="volunteer-main">

    <!-- PAGE TOP -->
    <section class="volunteer-top">
        <div>
            <h1>Volunteer Hours Tracking</h1>
            <p>Official university volunteer hour tracking for SkillSwap</p>
        </div>

        <a href="#" class="download-report">⬇️ Download Report</a>
    </section>

    <!-- SUMMARY CARDS -->
    <section class="volunteer-summary-grid">

        <div class="hours-card approved-card">
            <div class="card-top-line">
                <span class="hours-icon">🏅</span>
                <span class="status-mark">✓</span>
            </div>
            <h2><?php echo $approvedHours; ?></h2>
            <p>Approved Hours</p>
        </div>

        <div class="hours-card pending-card">
            <div class="card-top-line">
                <span class="hours-icon">🕒</span>
                <span class="status-pill">Pending</span>
            </div>
            <h2><?php echo $pendingHours; ?></h2>
            <p>Pending Approval</p>
        </div>

        <div class="hours-card completed-card">
            <span class="hours-icon">📈</span>
            <h2><?php echo $completedSessions; ?></h2>
            <p>Completed Sessions</p>
        </div>

        <div class="hours-card active-card">
            <span class="hours-icon">📅</span>
            <h2><?php echo $activeCount; ?></h2>
            <p>Active Sessions</p>
        </div>

    </section>

    <!-- PROGRESS -->
    <section class="volunteer-panel progress-panel">
        <h2><span class="panel-icon gold-text">🏅</span> Progress Towards Goal</h2>

        <div class="goal-row">
            <p>Volunteer Hours Goal: 100 hours</p>
            <strong><?php echo $approvedHours; ?> / 100</strong>
        </div>

        <div class="progress-bar">
            <div class="progress-fill" style="width: <?php echo $progressPercent; ?>%;"></div>
        </div>

        <p class="progress-note">
            <?php echo round($progressPercent); ?>% complete • <?php echo $remainingHours; ?> hours remaining
        </p>
    </section>

    <!-- MONTHLY HOURS -->
    <section class="volunteer-panel month-panel">
        <h2><span class="panel-icon blue-text">📅</span> Hours Earned by Month</h2>

        <div class="month-grid">
            <div class="month-item"><strong><?php echo $months[1]; ?></strong><span>Jan</span></div>
            <div class="month-item"><strong><?php echo $months[2]; ?></strong><span>Feb</span></div>
            <div class="month-item"><strong><?php echo $months[3]; ?></strong><span>Mar</span></div>
            <div class="month-item"><strong><?php echo $months[4]; ?></strong><span>Apr</span></div>
            <div class="month-item"><strong><?php echo $months[5]; ?></strong><span>May</span></div>
        </div>
    </section>

    <!-- APPROVAL STATUS -->
    <section class="approval-grid">

        <div class="small-panel">
            <h2><span class="panel-icon orange-text">🕒</span> Pending Approval (<?php echo count($pendingList); ?>)</h2>

            <?php if (count($pendingList) > 0): ?>
                <?php foreach ($pendingList as $hour): ?>
                    <p><?php echo $hour['hours_completed']; ?> hour pending approval</p>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No pending sessions</p>
            <?php endif; ?>
        </div>

        <div class="small-panel">
            <h2><span class="panel-icon green-text">✅</span> Approved Sessions (<?php echo count($approvedList); ?>)</h2>

            <?php if (count($approvedList) > 0): ?>
                <?php foreach ($approvedList as $hour): ?>
                    <p><?php echo $hour['hours_completed']; ?> approved hour</p>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No approved sessions yet</p>
            <?php endif; ?>
        </div>

    </section>

    <!-- ACTIVE SESSIONS -->
    <section class="volunteer-panel active-panel">
        <h2><span class="panel-icon purple-text">📅</span> Active Sessions - Ready to Submit</h2>

        <?php if ($activeCount > 0): ?>
            <?php foreach ($activeSessions as $session): ?>

                <div class="active-session-box">
                    <div>
                        <h3>Session #<?php echo $session['session_id']; ?></h3>
                        <p>Learner: <?php echo htmlspecialchars($session['learner_name'] ?? 'Unknown Learner'); ?></p>
                        <p>Session date: <?php echo htmlspecialchars($session['session_date']); ?></p>
                    </div>

                    <form method="POST">
                        <input type="hidden" name="session_id" value="<?php echo $session['session_id']; ?>">
                        <button type="submit" name="submit_hours" class="submit-hours-btn">
                            Submit Hours
                        </button>
                    </form>
                </div>

            <?php endforeach; ?>
        <?php else: ?>
            <p>No active sessions ready to submit</p>
        <?php endif; ?>

    </section>

    <!-- SESSION HISTORY -->
    <section class="volunteer-panel history-panel">
        <div class="history-top">
            <h2><span class="panel-icon blue-text">📈</span> Session History</h2>
            <button type="button" class="filter-button">🔎 Filter</button>
        </div>

        <?php if (count($pendingList) + count($approvedList) > 0): ?>

            <?php foreach (array_merge($pendingList, $approvedList) as $hour): ?>
                <div class="history-row">
                    <p>
                        <?php echo $hour['hours_completed']; ?> hour submitted on
                        <?php echo $hour['submitted_at']; ?>
                    </p>

                    <strong><?php echo ucfirst($hour['approved']); ?></strong>
                </div>
            <?php endforeach; ?>

        <?php else: ?>

            <div class="empty-history">
                <div class="empty-icon">🕒</div>
                <h3>No session history yet</h3>
                <p>Complete mentoring sessions to start earning volunteer hours</p>
            </div>

        <?php endif; ?>
    </section>

    <!-- ABOUT -->
    <section class="about-hours-card">
        <h2><span>🏅</span> About Volunteer Hours</h2>

        <ul>
            <li>All volunteer hours are officially tracked and verified by university administrators</li>
            <li>Approved hours can be used for scholarships, resumes, and graduation requirements</li>
            <li>Sessions must be confirmed by learners and approved by admins to count</li>
            <li>Download your official volunteer hours report anytime for your records</li>
        </ul>
    </section>

</main>

<?php include '../includes/footer.php'; ?>

<script src="../assets/js/script.js"></script>

</body>
</html>