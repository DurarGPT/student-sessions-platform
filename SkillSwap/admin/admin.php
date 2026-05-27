<?php
// Start session so PHP can remember logged-in users
session_start();
?>
<!DOCTYPE html>

<!--==================== admin panel page - RIMASS====================-->

<html lang="en">

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/admin_style.css">
    <link rel="stylesheet" href="../assets/css/client_style.css">
</head>

<body class="admin-page">

<?php include '../includes/header.php'; ?>

<!--admin hero section-->
<section class="admin-hero">

    <h1>Admin Panel</h1>

    <p>Manage volunteer hours and mentor verification.</p>

</section>



<!--admin stats section-->
<section class="admin-stats">

    <div class="admin-stat-card">
        <h2>Pending Approvals</h2>
        <p>0</p>
    </div>

    <div class="admin-stat-card">
        <h2>Pending Verification</h2>
        <p>1</p>
    </div>

    <div class="admin-stat-card">
        <h2>Verified Mentors</h2>
        <p>4</p>
    </div>

</section>



<!--admin content section-->
<section class="admin-content">

    <!--pending approvals-->
    <div class="admin-card">

        <h2>Pending Session Approvals</h2>

        <p>No pending approvals</p>

    </div>



    <!--mentor verification-->
    <div class="admin-card">

        <h2>Mentor Verification Requests</h2>

        <div class="mentor-card">

            <h3>Lisa Anderson</h3>

            <p>lisa.a@university.edu</p>

            <p>
                Media Arts student passionate about visual storytelling.
            </p>

            <div class="mentor-skills">
                <span>Photography</span>
                <span>Video Editing</span>
                <span>Adobe Suite</span>
            </div>

            <button class="approve-btn">Verify as Mentor</button>

        </div>

    </div>

</section>



<!--recent sessions section-->
<section class="admin-card">

    <h2>Recent Session History</h2>

    <p>No sessions yet</p>

</section>

<!--admin responsibilities section-->
<section class="admin-responsibilities">

    <h2>Admin Responsibilities</h2>

    <ul>

        <li>
            Review and verify mentor applications based on skills and qualifications
        </li>

        <li>
            Approve or reject volunteer hour submissions from completed sessions
        </li>

        <li>
            Monitor platform activity and ensure quality mentoring experiences
        </li>

        <li>
            Approved hours are officially added to student/professor records
        </li>

    </ul>

</section>
<?php include '../includes/footer.php'; ?>
<script src="../assets/js/script.js"></script>
</body>


</html>