<!DOCTYPE html>

<!--==================== dashboard page -RIMAS ====================-->

<html lang="en">

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../assets/css/client_style.css">
</head>

<body class="dashboard-page">


<?php include '../includes/header.php'; ?>


<main>

<section class="dashboard-hero">
    <h1>Welcome back, Emma!</h1>
    <p>Here's your SkillSwap activity overview.</p>
</section>

<section class="dashboard-stats">

    <div class="stat-card">
        <h2>Total Hours</h2>
        <p>24</p>
    </div>

    <div class="stat-card">
        <h2>Active Requests</h2>
        <p>0</p>
    </div>

    <div class="stat-card">
        <h2>Mentoring</h2>
        <p>0</p>
    </div>

    <div class="stat-card">
        <h2>Notifications</h2>
        <p>0</p>
    </div>

</section>

<section class="dashboard-grid">

    <div class="dashboard-card">
        <h2>Volunteer Hours</h2>
        <h3>Approved Hours</h3>
        <p>0</p>
        <h3>Pending</h3>
        <p>0</p>
        <h3>Completed</h3>
        <p>0</p>
        <button>View Full Volunteer Hours</button>
    </div>

    <div class="dashboard-card">
        <h2>Upcoming Sessions</h2>
        <p>No upcoming sessions</p>
        <button>Browse Requests</button>
    </div>

</section>

<section class="dashboard-grid">

    <div class="dashboard-card">
        <h2>My Recent Requests</h2>
        <p>No requests yet</p>
        <button>Post a Request</button>
    </div>

    <div class="dashboard-card">
        <h2>Recent Notifications</h2>
        <p>No new notifications</p>
    </div>

</section>

<section class="quick-actions">
    <h2>Quick Actions</h2>

    <div class="quick-buttons">
        <button>Post Request</button>
        <button>Browse Requests</button>
        <button>Edit Profile</button>
        <button>Track Hours</button>
    </div>
</section>

</main>

<hr>

<?php include '../includes/footer.php'; ?>

</body>

</html>