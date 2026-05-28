<?php
session_start();
include '../includes/db.php';

$pendingApprovals = 0;
$pendingVerification = 0;
$verifiedMentors = 0;
$recentSessions = 0;

try {
    $pendingApprovals = $pdo->query("SELECT COUNT(*) FROM volunteer_hours")->fetchColumn();
    $pendingVerification = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
    $verifiedMentors = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
    $recentSessions = $pdo->query("SELECT COUNT(*) FROM sessions")->fetchColumn();
} catch (PDOException $e) {
    $pendingApprovals = 0;
    $pendingVerification = 0;
    $verifiedMentors = 0;
    $recentSessions = 0;
}
?>
<!DOCTYPE html>

<!--==================== RIMASSS ALMUNTI  admin panel page ====================-->

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
        <p><?php echo $pendingApprovals; ?></p>
    </div>

    <div class="admin-stat-card">
        <h2>Pending Verification</h2>
        <p><?php echo $pendingVerification; ?></p>
    </div>

    <div class="admin-stat-card">
        <h2>Verified Mentors</h2>
        <p><?php echo $verifiedMentors; ?></p>
    </div>

</section>



<!--admin content section-->
<section class="admin-content">

    <!--pending approvals-->
    <div class="admin-card">

        <h2>Pending Session Approvals</h2>

        <?php if ($pendingApprovals > 0): ?>

            <p><?php echo $pendingApprovals; ?> pending approvals</p>

        <?php else: ?>

            <p>No pending approvals</p>

        <?php endif; ?>

    </div>



    <!--mentor verification-->
    <div class="admin-card">

        <h2>Mentor Verification Requests</h2>

        <div class="mentor-card">

            <div class="mentor-header">

                <div class="mentor-avatar">
                    LA
                </div>

                <div>
                    <h3>Lisa Anderson</h3>
                    <p>lisa.a@university.edu</p>
                </div>

            </div>


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

    <p><?php echo $recentSessions; ?> sessions found</p>

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