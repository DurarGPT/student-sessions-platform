<?php
// ================= PHP PROFILE LOGIC =================

// ⭐ EDIT ⭐ Start session + include DB
global $pdo;
session_start();
include 'includes/db.php';

// ⭐ EDIT ⭐ Get logged-in user ID
$userId = $_SESSION['user_id'];

// ⭐ EDIT ⭐ Fetch user data from database
$stmt = $pdo->prepare("SELECT * FROM users WHERE user_id=?");
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SkillSwap | Profile</title>

    <link rel="stylesheet" href="css/client_style.css">

</head>

<body>

<!-- ================= HEADER n================= -->
<header>
    <h1>SkillSwap</h1>

    <nav>
        <a href="client/index.php">Home</a>
        <a href="about.php">About</a>
        <a href="client/how-it-works.php">How It Works</a>
        <a href="browse-requests.php">Browse Requests</a>
        <a href="client/contact.php">Contact</a>
        <a href="client/inbox.php">Inbox</a>
        <a href="profile.php">Profile</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="client/post-request.php">Post Request</a>
        <a href="login.php">Logout</a>
    </nav>
</header>

<!-- ================= MAIN CONTENT ================= -->
<main class="profile-page">

    <!-- الكرت الأول: الصورة والمعلومات -->
    <div class="profile-card">

        <!-- ⭐ EDIT ⭐ Display user profile image -->
        <img src="uploads/profile/<?php echo $user['profile_image']; ?>" alt="User Photo">

        <h3>Basic Information</h3>

        <!-- ⭐ EDIT ⭐ Replace static text with real DB data -->
        <p><strong>Full Name:</strong> <?php echo $user['full_name']; ?></p>
        <p><strong>Role:</strong> <?php echo $user['role']; ?></p>
        <p><strong>University Email:</strong> <?php echo $user['email']; ?></p>

        <!-- ⭐ EDIT ⭐ Optional: volunteer hours if you add it later -->
        <p><strong>Volunteer Hours:</strong> 0</p>

        <p><strong>Skills:</strong> <?php echo $user['skills']; ?></p>
        <p><strong>Member Since:</strong> <?php echo date("M Y", strtotime($user['created_at'])); ?></p>

        <button>Change Photo</button>
    </div>

    <!-- الكرت الثاني: باقي الأقسام -->
    <div>
        <div class="profile-section">
            <h3>Bio / About Me</h3>

            <!-- ⭐ EDIT ⭐ Show real bio -->
            <p><?php echo $user['bio']; ?></p>
        </div>

        <div class="profile-section">
            <h3>My Skills</h3>

            <!-- ⭐ EDIT ⭐ Convert skills text into tags -->
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
            <p><strong>Session Type Preference:</strong> Both one-on-one and group sessions</p>
        </div>

        <div class="profile-section">
            <h3>Security & Settings</h3>

            <!-- ⭐ EDIT ⭐ Update form -->
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

<!-- ================= FOOTER ================= -->
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

        <a href="about.php">About</a><br>
        <a href="client/how-it-works.php">How It Works</a><br>
        <a href="browse-requests.php">Browse Requests</a><br>
        <a href="client/contact.php">Contact</a>
    </div>

    <div>
        <h3>For Students</h3>

        <a href="profile.php">Become a Mentor</a><br>
        <a href="client/post-request.php">Request Help</a><br>
        <a href="client/volunteer-hours.php">Track Hours</a><br>
        <a href="admin/admin.php">Admin Panel</a>
    </div>

    <div>
        <h3>Contact</h3>

        <p>University Campus</p>
        <p>support@skillswap.edu</p>
    </div>

    <p>© 2026 SkillSwap</p>

</footer>

</body>
</html>
