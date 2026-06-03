<?php
session_start();
include '../includes/db.php';

if (isset($_POST['apply_mentor']) && isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $stmt = $pdo->prepare("
        UPDATE users 
        SET role = 'mentor_pending' 
        WHERE user_id = ? AND role = 'student'
    ");
    $stmt->execute([$userId]);

    $_SESSION['success'] = "Mentor verification request submitted successfully!";

    header("Location: Dashboard.php");
    exit;
}
if (isset($_GET['accept_request']) && isset($_SESSION['user_id'])) {
    $requestId = $_GET['accept_request'];
    $mentorId = $_SESSION['user_id'];

    $stmt = $pdo->prepare("
        SELECT user_id, preferred_date
        FROM requests
        WHERE request_id = ? AND status = 'open'
    ");
    $stmt->execute([$requestId]);
    $request = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($request) {
        $studentId = $request['user_id'];
        $sessionDate = $request['preferred_date'];

        $stmt = $pdo->prepare("
            INSERT INTO sessions (mentor_id, student_id, request_id, session_date, status)
            VALUES (?, ?, ?, ?, 'pending')
        ");
        $stmt->execute([$mentorId, $studentId, $requestId, $sessionDate]);

        $stmt = $pdo->prepare("
            UPDATE requests
            SET status = 'accepted'
            WHERE request_id = ?
        ");
        $stmt->execute([$requestId]);

        $_SESSION['success'] = "Request accepted successfully!";
    }

    header("Location: Dashboard.php");
    exit;
}
$userRole = 'student';

if (isset($_SESSION['user_id'])) {
    $stmt = $pdo->prepare("SELECT role FROM users WHERE user_id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $userRole = $stmt->fetchColumn();
}

$userName = $_SESSION['user_name'] ?? "User";

$totalHours = 0;
$activeRequests = 0;
$mentoring = 0;
$notifications = 0;

try {
    $stmt = $pdo->query("SELECT COUNT(*) FROM requests");
    $activeRequests = $stmt->fetchColumn();

    $stmt = $pdo->query("SELECT COUNT(*) FROM sessions");
    $mentoring = $stmt->fetchColumn();

    $stmt = $pdo->query("
    SELECT sessions.*, requests.title, requests.category, requests.preferred_time, users.full_name
    FROM sessions
    LEFT JOIN requests ON sessions.request_id = requests.request_id
    LEFT JOIN users ON sessions.student_id = users.user_id
    WHERE LOWER(TRIM(sessions.status)) NOT IN ('completed', 'rejected')
    ORDER BY sessions.session_id DESC
    LIMIT 3
");
    $upcomingSessions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $pdo->query("
    SELECT sessions.*, requests.title, users.full_name
    FROM sessions
    LEFT JOIN requests ON sessions.request_id = requests.request_id
    LEFT JOIN users ON sessions.student_id = users.user_id
    ORDER BY sessions.session_id DESC
    LIMIT 1
");
    $recentNotifications = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = $pdo->query("
    SELECT COALESCE(SUM(hours_completed), 0)
    FROM volunteer_hours
    WHERE approved = 'approved'
");
    $totalHours = $stmt->fetchColumn();

    $stmt = $pdo->query("SELECT COUNT(*) FROM messages");
    $notifications = $stmt->fetchColumn();

} catch (PDOException $e) {
    $totalHours = 0;
    $activeRequests = 0;
    $mentoring = 0;
    $notifications = 0;
}
?>
<!DOCTYPE html>
<!--==================== RIMASSS ALMUNTI DASHBOARD PAGE  ====================-->
<html lang="en">

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/client_style.css">
</head>


<body class="dashboard-page">
<?php include '../includes/header.php'; ?>

<main>
    <?php if(isset($_SESSION['success'])): ?>
        <div class="success-message">
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </div>
    <?php endif; ?>


    <section class="dashboard-hero">
        <h1>
            Welcome back,
            <?php echo htmlspecialchars($_SESSION['name'] ?? 'User'); ?>
        </h1>
        <p>Here's your SkillSwap activity overview.</p>
    </section>

    <section class="dashboard-stats">

        <div class="stat-card">
            <div class="stat-info">
                <h2>Total Hours</h2>
                <p><?php echo $totalHours; ?></p>
            </div>
            <span class="stat-icon hours-icon">🏅</span>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <h2>Active Requests</h2>
                <p><?php echo $activeRequests; ?></p>
            </div>
            <span class="stat-icon requests-icon">📖</span>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <h2>Mentoring</h2>
                <p><?php echo $mentoring; ?></p>
            </div>
            <span class="stat-icon mentoring-icon">📈</span>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <h2>Notifications</h2>
                <p><?php echo $notifications; ?></p>
            </div>
            <span class="stat-icon notifications-icon">🔔</span>
        </div>

    </section>

    <section class="dashboard-grid">

        <div class="dashboard-card volunteer-card">
            <h2>🏅 Volunteer Hours</h2>

            <div class="hours-main-box">
                <h3>Approved Hours</h3>
                <p>0</p>
            </div>

            <div class="hours-small-grid">
                <div>
                    <h3>Pending</h3>
                    <p>0</p>
                </div>

                <div>
                    <h3>Completed</h3>
                    <p>0</p>
                </div>
            </div>

            <a href="volunteer-hours.php" class="dashboard-btn">
                View Full Volunteer Hours →
            </a>
        </div>
        <div class="dashboard-card upcoming-card">


                <h2>📅 Upcoming Sessions</h2>

                <?php if (!empty($upcomingSessions)) { ?>

                    <?php foreach ($upcomingSessions as $session) { ?>

                        <div class="session-item">

                            <h3>
                                <?php echo htmlspecialchars($session['title'] ?? $session['category'] ?? 'Mentoring Session'); ?>
                            </h3>

                            <p>
                                Learner:
                                <?php echo htmlspecialchars($session['full_name'] ?? 'Student'); ?>
                            </p>

                            <p>
                                Preferred time:
                                <?php echo htmlspecialchars($session['preferred_time'] ?? 'Flexible'); ?>
                            </p>


                                <div class="session-actions">
                                    <a href="chat.php">💬 Chat</a>
                                    <a href="schedule.php?requestId=<?php echo $session['request_id']; ?>">📅 Schedule</a>                                </div>
                                </div>
                            </div>

                        </div>

                    <?php } ?>

                <?php } else { ?>

                    <p>No upcoming sessions</p>

                    <a href="browse-requests.php" class="dashboard-btn">
                        Browse Requests
                    </a>

                <?php } ?>

            </div>
    </section>

    <section class="dashboard-grid">
        <div class="dashboard-card recent-requests-card">

            <h2>📖 My Recent Requests</h2>

            <?php
            $stmt = $pdo->query("
        SELECT *
        FROM requests
        ORDER BY request_id DESC
        LIMIT 3
    ");

            $recentRequests = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <?php if (!empty($recentRequests)) { ?>

                <?php foreach ($recentRequests as $request) { ?>

                    <div class="request-item">

                        <div class="request-item-header">

                            <h3>
                                <?php echo htmlspecialchars($request['category']); ?>
                            </h3>

                            <span class="status-badge">
            <?php echo htmlspecialchars($request['status']); ?>
        </span>

                        </div>

                        <p>
                            <?php echo htmlspecialchars(substr($request['description'],0,40)); ?>
                        </p>

                        <p class="mentor-name">
                            Mentor: Assigned Mentor
                        </p>

                    </div>

                <?php } ?>

            <?php } else { ?>

                <p>No requests yet</p>

            <?php } ?>

        </div>
        <div class="dashboard-card notifications-card">
            <h2>🔔 Recent Notifications</h2>

            <?php if (!empty($recentNotifications)) { ?>

                <span class="notification-badge">
            <?php echo count($recentNotifications); ?> New
        </span>

                <?php foreach ($recentNotifications as $notification) { ?>

                    <div class="notification-item">
                        <strong>
                            New <?php echo htmlspecialchars($notification['title'] ?? 'Session'); ?> Request
                        </strong>

                        <p>
                            From: <?php echo htmlspecialchars($notification['full_name'] ?? 'Student'); ?>
                        </p>

                        <p>
                            <?php echo htmlspecialchars($notification['session_date'] ?? 'No date'); ?>
                        </p>
                    </div>

                <?php } ?>

            <?php } else { ?>

                <p>No new notifications</p>

            <?php } ?>

            <a href="inbox.php" class="view-notifications-btn">
                View All Notifications →
            </a>
        </div>
    </section>

    <section class="quick-actions">
        <h2>Quick Actions</h2>

        <div class="quick-buttons">
            <a href="post-request.php" class="dashboard-btn">Post Request</a>
            <a href="browse-requests.php" class="dashboard-btn">Browse Requests</a>
            <a href="profile.php" class="dashboard-btn">Edit Profile</a>
            <!--apply button-->

            <?php if ($userRole == 'student'): ?>
                <form method="POST" action="Dashboard.php" style="margin: 0;">
                    <button type="submit" name="apply_mentor" class="dashboard-btn">
                        Apply for Mentor Verification
                    </button>
                </form>
            <?php endif; ?>

            <a href="volunteer-hours.php" class="dashboard-btn">Track Hours</a>
        </div>
    </section>

</main>

<?php include '../includes/footer.php'; ?>
<script src="../assets/js/script.js"></script>

</body>
</html>