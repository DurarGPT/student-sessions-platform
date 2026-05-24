<?php
// ================= PHP PROFILE LOGIC =================
// هنا لاحقًا نضيف كود جلب بيانات المستخدم من قاعدة البيانات
// مثال:
// $user = getUserFromDatabase($_SESSION["user_id"]);
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
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="how-it-works.php">How It Works</a>
        <a href="browse-requests.php">Browse Requests</a>
        <a href="contact.php">Contact</a>
        <a href="inbox.php">Inbox</a>
        <a href="profile.php">Profile</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="post-request.php">Post Request</a>
        <a href="login.php">Logout</a>
    </nav>
</header>

<!-- ================= MAIN CONTENT ================= -->
<main class="profile-page">

    <!-- الكرت الأول: الصورة والمعلومات -->
    <div class="profile-card">
        <img src="images/user-photo.png" alt="User Photo">
        <h3>Basic Information</h3>
        <p><strong>Full Name:</strong> Emma Johnson</p>
        <p><strong>Role:</strong> Student</p>
        <p><strong>University Email:</strong> emma@university.edu</p>
        <p><strong>Volunteer Hours:</strong> 24</p>
        <p><strong>Skills:</strong> 3</p>
        <p><strong>Member Since:</strong> Jan 2026</p>
        <button>Change Photo</button>
    </div>

    <!-- الكرت الثاني: باقي الأقسام -->
    <div>
        <div class="profile-section">
            <h3>Bio / About Me</h3>
            <p>Senior Computer Science student passionate about design and web development.</p>
        </div>

        <div class="profile-section">
            <h3>My Skills</h3>
            <span class="skill-tag">UI Design</span>
            <span class="skill-tag">Figma</span>
            <span class="skill-tag">JavaScript</span>
        </div>

        <div class="profile-section">
            <h3>Session Preferences</h3>
            <p><strong>Availability:</strong> Weekday evenings, Weekend mornings</p>
            <p><strong>Session Type Preference:</strong> Both one-on-one and group sessions</p>
        </div>

        <div class="profile-section">
            <h3>Security & Settings</h3>
            <button>Change Password</button>
            <button>Email Notifications</button>
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
        <a href="how-it-works.php">How It Works</a><br>
        <a href="browse-requests.php">Browse Requests</a><br>
        <a href="contact.php">Contact</a>
    </div>

    <div>
        <h3>For Students</h3>

        <a href="profile.php">Become a Mentor</a><br>
        <a href="post-request.php">Request Help</a><br>
        <a href="volunteer-hours.php">Track Hours</a><br>
        <a href="admin.php">Admin Panel</a>
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
