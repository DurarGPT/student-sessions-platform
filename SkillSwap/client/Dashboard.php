<?php
// Start session so PHP can remember logged-in users
session_start();
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

    <section class="dashboard-hero">
        <h1>Welcome back,    </h1>
        <p>Here's your SkillSwap activity overview.</p>
    </section>

    <section class="dashboard-stats">

        <div class="stat-card">
            <div class="stat-info">
                <h2>Total Hours</h2>
                <p>24</p>
            </div>
            <span class="stat-icon hours-icon">🏅</span>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <h2>Active Requests</h2>
                <p>0</p>
            </div>
            <span class="stat-icon requests-icon">📖</span>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <h2>Mentoring</h2>
                <p>0</p>
            </div>
            <span class="stat-icon mentoring-icon">📈</span>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <h2>Notifications</h2>
                <p>0</p>
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

            <div class="upcoming-empty">

                <div class="upcoming-icon">📅</div>

                <p>No upcoming sessions</p>

                <a href="browse-requests.php" class="secondary-btn">
                    Browse Requests
                </a>

            </div>

        </div>

    </section>

    <section class="dashboard-grid">
        <div class="dashboard-card upcoming-card">

            <h2>📖 My Recent Requests</h2>

            <div class="upcoming-empty">

                <div class="upcoming-icon">📖</div>

                <p>No requests yet</p>

                <a href="post-request.php" class="secondary-btn">
                    Post a Request
                </a>

            </div>

        </div>
        <div class="dashboard-card notifications-card">
            <h2>🔔 Recent Notifications</h2>

            <div class="empty-state">
                <div class="empty-icon">🔔</div>
                <p>No new notifications</p>
            </div>
        </div>

    </section>

    <section class="quick-actions">
        <h2>Quick Actions</h2>

        <div class="quick-buttons">
            <a href="post-request.php" class="dashboard-btn">Post Request</a>
            <a href="browse-requests.php" class="dashboard-btn">Browse Requests</a>
            <a href="profile.php" class="dashboard-btn">Edit Profile</a>
            <a href="volunteer-hours.php" class="dashboard-btn">Track Hours</a>
        </div>
    </section>

</main>

<?php include '../includes/footer.php'; ?>
<script src="../assets/js/script.js"></script>

</body>
</html>