<?php
// ================= ADMIN DASHBOARD PAGE =================
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SkillSwap | Admin Dashboard</title>

    <!-- ================= connect to  CSS ================= -->

    <link rel="stylesheet" href="admin_style.css">

</head>

<body class="admin-dashboard-page">

<!-- ================= HEADER as usual================= -->

<header>

    <h1>SkillSwap</h1>

    <nav>
        <a href="../client/index.php">Home</a>
        <a href="../client/about.php">About</a>
        <a href="../client/how-it-works.php">How It Works</a>
        <a href="browse-requests.php">Browse Requests</a>
        <a href="../client/contact.php">Contact</a>
        <a href="../client/inbox.php">Inbox</a>
        <a href="../client/profile.php">Profile</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="../client/post-request.php">Post Request</a>
        <a href="../login.php">Logout</a>
    </nav>

</header>

<!-- ================= MAIN CONTAINER ================= -->

<main class="admin-container">

    <!-- ================= PAGE TITLE ================= -->

    <section class="dashboard-title">

        <h2>
            Admin Dashboard

            <span class="admin-label">
                Admin Access Only
            </span>
        </h2>

        <p>
            Manage users, mentors, and volunteer sessions
        </p>

    </section>

    <!-- ================= STATISTICS ================= -->

    <section class="stats-container">

        <div class="stat-card users-card">

            <div>
                <p>Total Users</p>
                <h3>6</h3>
            </div>

            <span class="card-icon">👥</span>

        </div>

        <div class="stat-card sessions-card">

            <div>
                <p>Total Sessions</p>
                <h3>0</h3>
            </div>

            <span class="card-icon">📄</span>

        </div>

        <div class="stat-card approvals-card">

            <div>
                <p>Pending Approvals</p>
                <h3>0</h3>
            </div>

            <span class="card-icon">⏱️</span>

        </div>

        <div class="stat-card hours-card">

            <div>
                <p>Volunteer Hours</p>
                <h3>147</h3>
            </div>

            <span class="card-icon">🏅</span>

        </div>

    </section>

    <!-- ================= TOP GRID ================= -->

    <section class="dashboard-grid">

        <!-- ================= MENTOR REQUESTS ================= -->

        <div class="dashboard-box mentor-box">

            <div class="section-header">

                <h3>
                    Pending Mentor Requests
                </h3>

                <span class="pending-tag">
                    1 Pending
                </span>

            </div>

            <div class="mentor-request">

                <div class="mentor-avatar">
                    LA
                </div>

                <div class="mentor-info">

                    <h4>Lisa Anderson</h4>

                    <p>
                        lisa.a@university.edu
                    </p>

                    <div class="skills-list">

                        <span>Photography</span>
                        <span>Video Editing</span>
                        <span>Adobe Suite</span>

                    </div>

                    <button class="verify-button">
                        Verify as Mentor
                    </button>

                </div>

            </div>

        </div>

        <!-- ================= USER OVERVIEW ================= -->

        <aside class="dashboard-box overview-box">

            <div class="section-header">

                <h3>
                    User Overview
                </h3>

            </div>

            <div class="overview-card">

                <div>
                    <p>Students</p>
                    <h4>4</h4>
                </div>

                <span>👥</span>

            </div>

            <div class="overview-card">

                <div>
                    <p>Verified Mentors</p>
                    <h4>4</h4>
                </div>

                <span>🛡️</span>

            </div>

            <div class="overview-card">

                <div>
                    <p>Active Requests</p>
                    <h4>3</h4>
                </div>

                <span>📈</span>

            </div>

        </aside>

    </section>

    <!-- ================= SESSION APPROVALS ================= -->

    <section class="dashboard-box approvals-section">

        <div class="section-header">

            <h3>
                Pending Session Approvals
            </h3>

        </div>

        <div class="empty-approvals">

            <div class="approval-icon">
                ✓
            </div>

            <p>
                No pending session approvals
            </p>

        </div>

    </section>

    <!-- ================= BOTTOM GRID ================= -->

    <section class="dashboard-grid bottom-grid">

        <!-- ================= RECENT ACTIVITY ================= -->

        <div class="dashboard-box activity-section">

            <div class="section-header">

                <h3>
                    Recent Activity
                </h3>

            </div>

            <div class="activity-item">

                <div class="activity-left">

                    <span class="green-dot"></span>

                    <div>
                        <h4>Mentor approved</h4>
                        <p>Emma Johnson</p>
                    </div>

                </div>

                <span class="activity-time">
                    2 hours ago
                </span>

            </div>

            <div class="activity-item">

                <div class="activity-left">

                    <span class="green-dot"></span>

                    <div>
                        <h4>Session approved</h4>
                        <p>Dr. Michael Chen</p>
                    </div>

                </div>

                <span class="activity-time">
                    3 hours ago
                </span>

            </div>

            <div class="activity-item">

                <div class="activity-left">

                    <span class="blue-dot"></span>

                    <div>
                        <h4>New request posted</h4>
                        <p>Sarah Martinez</p>
                    </div>

                </div>

                <span class="activity-time">
                    5 hours ago
                </span>

            </div>

            <div class="activity-item">

                <div class="activity-left">

                    <span class="green-dot"></span>

                    <div>
                        <h4>Mentor approved</h4>
                        <p>James Wilson</p>
                    </div>

                </div>

                <span class="activity-time">
                    1 day ago
                </span>

            </div>

            <div class="activity-item">

                <div class="activity-left">

                    <span class="green-dot"></span>

                    <div>
                        <h4>Session approved</h4>
                        <p>Lisa Anderson</p>
                    </div>

                </div>

                <span class="activity-time">
                    1 day ago
                </span>

            </div>

        </div>

        <!-- ================= REPORTS ================= -->

        <aside class="dashboard-box reports-section">

            <div class="section-header">

                <h3>
                    Reports
                </h3>

            </div>

            <p class="reports-text">

                Export platform data and analytics
                for university records and reporting.

            </p>

            <button class="report-button main-report-btn">
                Download Full Report
            </button>

            <button class="report-button">
                Export User Data
            </button>

            <button class="report-button">
                Export Volunteer Hours
            </button>

        </aside>

    </section>

</main>

<!-- ================= FOOTER as usual ================= -->

<footer>

    <div>
        <h3>SkillSwap</h3>

        <p>
            Learn. Teach. Earn. Empowering university students
            through peer mentoring.
        </p>
    </div>

    <div>
        <h3>Quick Links</h3>

        <a href="../client/about.php">About</a><br>
        <a href="../client/how-it-works.php">How It Works</a><br>
        <a href="browse-requests.php">Browse Requests</a><br>
        <a href="../client/contact.php">Contact</a>
    </div>

    <div>
        <h3>For Students</h3>

        <a href="../client/profile.php">Become a Mentor</a><br>
        <a href="../client/post-request.php">Request Help</a><br>
        <a href="../client/volunteer-hours.php">Track Hours</a><br>
        <a href="admin.php">Admin Panel</a>
    </div>

    <div>
        <h3>Contact</h3>

        <p>University Campus</p>
        <p>support@skillswap.edu</p>
    </div>

    <p>©️ 2026 SkillSwap</p>

</footer>

</body>
</html>