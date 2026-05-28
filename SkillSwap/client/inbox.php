<?php
include '../includes/db.php';
include '../includes/header.php';
?>

    <link rel="stylesheet" href="../assets/css/client_style.css">

<?php

/* جلب الجلسات المقبولة */
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

    <main class="notification-page">

        <!-- عنوان الصفحة -->

        <section class="notification-hero">

            <h2>
                <i class="fa-regular fa-bell"></i>
                Notifications
            </h2>

            <p>
                Requests matching your skills
            </p>

        </section>

        <!-- الإشعارات -->

        <section class="notification-card">

            <?php if(count($notifications) > 0) { ?>

                <?php foreach($notifications as $notification) { ?>

                    <div class="notification-item">

                        <h3>
                            New Session Scheduled
                        </h3>

                        <p>
                            Skill:
                            <strong>
                                <?php echo $notification['title']; ?>
                            </strong>
                        </p>

                        <p>
                            Date:
                            <strong>
                                <?php echo $notification['session_date']; ?>
                            </strong>
                        </p>

                        <p>
                            Time:
                            <strong>
                                <?php echo $notification['session_time']; ?>
                            </strong>
                        </p>

                        <span class="notification-badge">

                        <?php echo $notification['status']; ?>

                    </span>

                    </div>

                <?php } ?>

            <?php } else { ?>

                <div class="empty-notification">

                    <h3>No notifications</h3>

                    <p>
                        You'll receive notifications when sessions are scheduled
                    </p>

                </div>

            <?php } ?>

        </section>

        <!-- معلومات -->

        <section class="notification-info">

            <h3>About Notifications</h3>

            <p>
                Notifications appear automatically when a session is scheduled.
            </p>

        </section>

    </main>

    <script src="../../assets/js/script.js"></script>

<?php include '../includes/footer.php'; ?>