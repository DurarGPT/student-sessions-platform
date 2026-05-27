<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>SkillSwap | Login</title>

    <link rel="stylesheet" href="../assets/css/client_style.css">
    <link rel="stylesheet" href="../assets/css/auth.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

<?php include '../includes/header.php'; ?>

<main class="login-page">

    <div class="login-header">

        <h1>Welcome Back</h1>

        <p>Log in to your SkillSwap account</p>

    </div>


    <section class="login-card">

        <h3>Login</h3>

        <form class="login-form" method="POST">

            <div class="form-group">

                <label for="email">
                    University Email
                </label>

                <div class="login-input-wrapper">

                    <i class="fa-regular fa-envelope"></i>

                    <input
                            id="email"
                            name="email"
                            type="email"
                            placeholder="your.email@university.edu"
                            required>

                </div>

            </div>


            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <div class="login-input-wrapper">

                    <i class="fa-solid fa-lock"></i>

                    <input
                            id="password"
                            name="password"
                            type="password"
                            placeholder="Enter your password"
                            required>

                </div>

            </div>


            <button type="submit" class="login-btn">

                Log In

            </button>

        </form>


        <p class="login-switch">

            Don't have an account?

            <a href="register.php">

                Sign up

            </a>

        </p>

    </section>

</main>

<?php include '../includes/footer.php'; ?>

</body>

</html>