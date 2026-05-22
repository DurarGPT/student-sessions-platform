<?php
// ================= PHP REGISTER LOGIC =================
// هنا لاحقًا نضيف كود إدخال المستخدم في قاعدة البيانات
// مثال:
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $name = $_POST["name"];
//     $email = $_POST["email"];
//     $password = $_POST["password"];
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SkillSwap | Register</title>
    <link rel="stylesheet" href="auth.css">

</head>

<body>

<!-- ================= HEADER ================= -->
<header>
    <h1>SkillSwap</h1>

    <nav>
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="how-it-works.php">How It Works</a>
        <a href="browse-requests.php">Browse Requests</a>
        <a href="contact.php">Contact</a>
        <a href="login.php">Login</a>
        <a href="register.php">Sign Up</a>
    </nav>
</header>

<!-- ================= MAIN CONTENT ================= -->
<main class="register-page">

    <div class="register-header">
        <h1>Join SkillSwap</h1>
        <p>Start learning and teaching today</p>
    </div>

    <div class="register-card">
        <h2>Create Your Account</h2>

        <!-- IMPORTANT: form now uses POST and has name attributes -->
        <form class="register-form" method="POST" action="">

            <label for="name">Full Name</label>
            <input id="name" name="name" type="text" placeholder="John Doe" required>

            <label for="email">University Email</label>
            <input id="email" name="email" type="email" placeholder="you@university.edu" required>

            <label for="password">Password</label>
            <input id="password" name="password" type="password" placeholder="Min. 6 characters" required>

            <label for="confirm">Confirm Password</label>
            <input id="confirm" name="confirm" type="password" placeholder="Repeat password" required>

            <label>What brings you to SkillSwap?</label>
            <div class="option-boxes">
                <div class="option-box active">
                    <p><strong>I Want to Learn</strong></p>
                    <p>Request skills, connect with mentors, and grow your knowledge.</p>
                </div>
                <div class="option-box">
                    <p><strong>I Want to Teach</strong></p>
                    <p>Help others, share your expertise, and earn volunteer hours.</p>
                </div>
            </div>

            <label for="role">University Role</label>
            <select id="role" name="role">
                <option>Student</option>
                <option>Professor</option>
            </select>

            <label for="skills">Your Skills</label>
            <input id="skills" name="skills" type="text" placeholder="e.g., Java, UI Design, English (comma-separated)">

            <label for="bio">Bio</label>
            <textarea id="bio" name="bio" placeholder="Tell others about yourself and your expertise..."></textarea>

            <button type="submit" class="register-btn">Create Account</button>
        </form>

        <p class="auth-switch">
            Already have an account? <a href="login.php">Log in</a>
        </p>
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
