<?php
// ================= PHP PROFILE LOGIC =================

// Start session + include DB
session_start();
require_once __DIR__ . '/../includes/db.php';

// مؤقتًا للتجربة لو ما فيه تسجيل دخول
// $_SESSION['user_id'] = 1;

// Get logged-in user ID
$userId = $_SESSION['user_id'];

// Fetch user data
$stmt = $pdo->prepare("SELECT * FROM users WHERE user_id=?");
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SkillSwap | Profile</title>

    <link rel="stylesheet" href="../assets/css/client_style.css">
</head>

<body>

<?php include '../includes/header.php'; ?>

<main class="profile-page">

    <!-- الكرت الأول: الصورة والمعلومات -->
    <div class="profile-card">

        <img src="../uploads/profile/<?php echo $user['profile_image']; ?>" alt="User Photo">

        <h3>Basic Information</h3>

        <p><strong>Full Name:</strong> <?php echo $user['full_name']; ?></p>
        <p><strong>Role:</strong> <?php echo $user['role']; ?></p>
        <p><strong>University Email:</strong> <?php echo $user['email']; ?></p>
        <p><strong>Volunteer Hours:</strong> 0</p>
        <p><strong>Skills:</strong> <?php echo $user['skills']; ?></p>
        <p><strong>Member Since:</strong> <?php echo date("M Y", strtotime($user['created_at'])); ?></p>

        <button>Change Photo</button>
    </div>

    <!-- الكرت الثاني -->
    <div>
        <div class="profile-section">
            <h3>Bio / About Me</h3>
            <p><?php echo $user['bio']; ?></p>
        </div>

        <div class="profile-section">
            <h3>My Skills</h3>
            <?php
            $skills = explode(",", $user['skills']);
            foreach ($skills as $skill) {
                echo "<span class='skill-tag'>" . trim($skill) . "</span>";
            }
            ?>
        </div>

        <div class="profile-section">
            <h3>Session Preferences</h3>
            <p><strong>Availability:</strong> Weekday evenings, Weekend mornings</p>
            <p><strong>Session Type Preference:</strong> One-on-one & Group</p>
        </div>

        <div class="profile-section">
            <h3>Security & Settings</h3>

            <form action="update_profile.php" method="POST" enctype="multipart/form-data">

                <label>Full Name:</label><br>
                <input type="text" name="full_name" value="<?php echo $user['full_name']; ?>">
                <br><br>

                <label>New Password:</label><br>
                <input type="password" name="password">
                <br><br>

                <label>Profile Image:</label><br>
                <input type="file" name="profile_image">
                <br><br>

                <button type="submit">Save Changes</button>
            </form>

        </div>
    </div>

</main>

<?php include '../includes/footer.php'; ?>

</body>
</html>
