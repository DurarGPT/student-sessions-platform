<?php include '../includes/db.php'; ?>
<?php include '../includes/header.php'; ?>

    <main>

        <section class="notification-card">
            <h2>Notifications</h2>
            <p>Requests matching your skills</p>
        </section>

        <!-- مافي اشعارات -->
        <section class="notification-card">

            <h1>Notification</h1>

            <h3>No notifications</h3>

            <p>
                You'll receive notifications when students request help
                with skills you have
            </p>

        </section>

        <!-- معلومات الاشعارات -->
        <section class="notification-card">

            <h3>About Notifications</h3>

            <p>
                You receive notifications when students post requests for skills
                you have listed in your profile. Only one mentor can accept
                each request, so respond quickly to help students learn!
            </p>
            <button class="blue-button" onclick="showNotification()">
                Check Notifications
            </button>
        </section>

    </main>
    <script src="../../assets/js/script.js"></script>
<?php include '../includes/footer.php'; ?>