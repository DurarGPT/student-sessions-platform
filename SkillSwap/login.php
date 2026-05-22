<?php
// ================= PHP LOGIN LOGIC =================
// لاحقًا بنضيف كود التحقق من المستخدم من قاعدة البيانات هنا
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $email = $_POST["email"];
//     $password = $_POST["password"];
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SkillSwap | Login</title>

    <!-- ========== AUTH PAGE STYLES ========== -->

    <link rel="stylesheet" href="auth.css">


</head>

<body>

<!-- ================= HEADER ================= -->
<header>
    <img src="/SkillSwap/images/logo.png" alt="SkillSwap Logo" class="logo-img">

    <nav>
        <a href="/SkillSwap/index.php">Home</a>
        <a href="/SkillSwap/about.php">About</a>
        <a href="/SkillSwap/how-it-works.php">How It Works</a>
        <a href="/SkillSwap/browse-requests.php">Browse Requests</a>
        <a href="/SkillSwap/contact.php">Contact</a>
        <a href="/SkillSwap/login.php">Login</a>
        <a href="/SkillSwap/register.php">Sign Up</a>
    </nav>
</header>

<!-- ================= LOGIN CONTENT ================= -->
<main class="login-page">

    <h2>Welcome Back</h2>
    <p>Log in to your SkillSwap account</p>

    <section>
        <div class="auth-card">
            <h3>Login</h3>

            <form class="auth-form" method="POST" action="">
                <div class="form-group">
                    <label for="email">University Email</label>
                    <input id="email" name="email" type="email" placeholder="your.email@university.edu" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="Enter your password" required>
                </div>

                <button type="submit" class="primary-btn">Log In</button>
            </form>

            <p class="auth-switch">
                Don't have an account? <a href="/SkillSwap/register.php">Sign up</a>
            </p>
        </div>
    </section>

</main>

<!-- ================= FOOTER ================= -->
<footer>
    <div>
        <h3>SkillSwap</h3>
        <p>Learn. Teach. Earn. Empowering university students through peer mentoring.</p>
    </div>

    <div>
        <h3>Quick Links</h3>
        <a href="/SkillSwap/about.php">About</a><br>
        <a href="/SkillSwap/how-it-works.php">How It Works</a><br>
        <a href="/SkillSwap/browse-requests.php">Browse Requests</a><br>
        <a href="/SkillSwap/contact.php">Contact</a>
    </div>

    <div>
        <h3>For Students</h3>
        <a href="/SkillSwap/profile.php">Become a Mentor</a><br>
        <a href="/SkillSwap/post-request.php">Request Help</a><br>
        <a href="/SkillSwap/volunteer-hours.php">Track Hours</a><br>
        <a href="/SkillSwap/admin.php">Admin Panel</a>
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
