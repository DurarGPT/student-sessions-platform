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
    <link rel="stylesheet" href="./assets/css/auth.css">
</head>

<body>

<!-- ================= HEADER ================= -->
<?php include './includes/header.php'; ?>

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
                Don't have an account?
                <a href="./client/register.php">Sign up</a>
            </p>
        </div>
    </section>
</main>

<!-- ================= FOOTER ================= -->
<?php include './includes/footer.php'; ?>

</body>
</html>
