<?php
session_start();
include '../includes/db.php';
if (isset($_POST['verify_mentor'])) {
    $userId = $_POST['user_id'];

    $stmt = $pdo->prepare("UPDATE users SET role = 'mentor' WHERE user_id = ?");
    $stmt->execute([$userId]);

    header("Location: admin.php");
    exit;
}
$pendingApprovals = 0;
$pendingVerification = 0;
$verifiedMentors = 0;
$recentSessions = 0;

try {
    $pendingApprovals = $pdo->query("SELECT COUNT(*) FROM volunteer_hours")->fetchColumn();
    $pendingVerification = $pdo->query("SELECT COUNT(*) FROM users WHERE role = 'mentor_pending'")->fetchColumn();
    $verifiedMentors = $pdo->query("SELECT COUNT(*) FROM users WHERE role = 'mentor'")->fetchColumn();
    $recentSessions = $pdo->query("SELECT COUNT(*) FROM sessions")->fetchColumn();
    $pendingMentors = $pdo->query("SELECT * FROM users WHERE role = 'mentor_pending'")->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $pendingApprovals = 0;
    $pendingVerification = 0;
    $verifiedMentors = 0;
    $recentSessions = 0;
    $pendingMentors = [];
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
    <?php if (count($pendingMentors) > 0): ?>

        <?php foreach ($pendingMentors as $mentor): ?>
            <div class="mentor-card">

                <div class="mentor-header">
                    <div class="mentor-avatar">
                        <?php echo strtoupper(substr($mentor['full_name'], 0, 2)); ?>
                    </div>

                    <div>
                        <h3><?php echo htmlspecialchars($mentor['full_name']); ?></h3>
                        <p><?php echo htmlspecialchars($mentor['email']); ?></p>
                    </div>
                </div>

                <p>
                    <?php echo htmlspecialchars($mentor['bio'] ?? 'No bio available.'); ?>
                </p>

                <div class="mentor-skills">
                    <span><?php echo htmlspecialchars($mentor['skills'] ?? 'No skills listed'); ?></span>
                </div>

                <form method="POST" action="admin.php">
                    <input type="hidden" name="user_id" value="<?php echo $mentor['user_id']; ?>">
                    <button type="submit" name="verify_mentor" class="approve-btn">
                        Verify as Mentor
                    </button>
                </form>

            </div>
        <?php endforeach; ?>

    <?php else: ?>

        <p>No mentor verification requests</p>

    <?php endif; ?>
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