<?php
global $pdo;
include '../includes/db.php';
include '../includes/header.php';

/* جلب الإشعارات */
$stmt = $pdo->prepare("
    SELECT
        sessions.*,
        requests.title
    FROM sessions
    JOIN requests
        ON sessions.request_id = requests.request_id
    WHERE sessions.status = 'scheduled'
    ORDER BY sessions.session_id DESC
");

$stmt->execute();
$notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    <link rel="stylesheet" href="../assets/css/client_style.css">

    <main class="notification-page">

        <section class="notification-hero">
            <h1>
                <i class="fa-regular fa-bell"></i>
                Notifications
            </h1>

            <p>Requests matching your skills</p>
        </section>

        <section class="notification-card">

            <?php if (count($notifications) > 0): ?>

                <?php foreach ($notifications as $notification): ?>

                    <div class="notification-item">
                        <h3>New Session Scheduled</h3>

                        <p>
                            Skill:
                            <strong><?php echo htmlspecialchars($notification['title']); ?></strong>
                        </p>

                        <p>
                            Date:
                            <strong><?php echo htmlspecialchars($notification['session_date']); ?></strong>
                        </p>

                        <?php if (!empty($notification['session_time'])): ?>
                            <p>
                                Time:
                                <strong><?php echo htmlspecialchars($notification['session_time']); ?></strong>
                            </p>
                        <?php endif; ?>

                        <span class="notification-badge">
                        <?php echo htmlspecialchars($notification['status']); ?>
                    </span>
                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="empty-notification">
                    <i class="fa-regular fa-bell"></i>

                    <h3>No notifications</h3>

                    <p>
                        You'll receive notifications when students request help with skills you have
                    </p>
                </div>

            <?php endif; ?>

        </section>

        <section class="notification-info">
            <h3>About Notifications</h3>

            <p>
                You receive notifications when students post requests for skills you have listed in your profile.
                Only one mentor can accept each request, so respond quickly to help students learn!
            </p>
        </section>

    </main>

    <script src="../assets/js/script.js"></script>

<?php include '../includes/footer.php'; ?>