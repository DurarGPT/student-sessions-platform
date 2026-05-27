<?php
session_start();
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $role = strtolower($_POST['role']);
    $skills = $_POST['skills'];
    $bio = $_POST['bio'];

    if ($password !== $confirm) {
        $error = "Passwords do not match.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("
            INSERT INTO users (full_name, email, password, role, bio, skills, profile_image)
            VALUES (?, ?, ?, ?, ?, ?, 'default.png')
        ");

        $stmt->execute([$name, $email, $hashedPassword, $role, $bio, $skills]);

        header("Location: login.php");
        exit;
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SkillSwap | Register</title>

    <!-- CLIENT CSS -->
    <link rel="stylesheet" href="../assets/css/client_style.css">

    <!-- AUTH CSS -->
    <link rel="stylesheet" href="../assets/css/auth.css">

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<!-- ================= HEADER ================= -->

<?php include '../includes/header.php'; ?>
<!-- ================= MAIN CONTENT ================= -->
<main class="register-page">

    <!-- HEADER -->
    <div class="register-header">
        <h1>Join SkillSwap</h1>
        <p>Start learning and teaching today</p>
    </div>

    <!-- CARD -->
    <div class="register-card">

        <h2>Create Your Account</h2>

        <?php if (!empty($error)): ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form class="register-form" method="POST" action="">

            <!-- ================= FIRST ROW ================= -->
            <div class="form-row">

                <!-- FULL NAME -->
                <div class="form-group">

                    <label for="name">Full Name *</label>

                    <div class="input-wrapper">

                        <i class="fa-regular fa-user"></i>

                        <input
                                id="name"
                                name="name"
                                type="text"
                                placeholder="John Doe"
                                required>

                    </div>

                </div>

                <!-- EMAIL -->
                <div class="form-group">

                    <label for="email">University Email *</label>

                    <div class="input-wrapper">

                        <i class="fa-regular fa-envelope"></i>

                        <input
                                id="email"
                                name="email"
                                type="email"
                                placeholder="you@university.edu"
                                required>

                    </div>

                </div>

            </div>

            <!-- ================= SECOND ROW ================= -->
            <div class="form-row">

                <!-- PASSWORD -->
                <div class="form-group">

                    <label for="password">Password *</label>

                    <div class="input-wrapper">

                        <i class="fa-solid fa-lock"></i>

                        <input
                                id="password"
                                name="password"
                                type="password"
                                placeholder="Min. 6 characters"
                                required>

                    </div>

                </div>

                <!-- CONFIRM PASSWORD -->
                <div class="form-group">

                    <label for="confirm">Confirm Password *</label>

                    <div class="input-wrapper">

                        <i class="fa-solid fa-lock"></i>

                        <input
                                id="confirm"
                                name="confirm"
                                type="password"
                                placeholder="Repeat password"
                                required>

                    </div>

                </div>

            </div>

            <!-- ================= OPTION BOXES ================= -->
            <label>What brings you to SkillSwap? *</label>

            <div class="option-boxes">

                <!-- LEARN -->
                <div class="option-box active">

                    <div class="option-icon learn-icon">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>

                    <p><strong>I Want to Learn</strong></p>

                    <p>
                        Request skills, connect with mentors,
                        and grow your knowledge.
                    </p>

                </div>

                <!-- TEACH -->
                <div class="option-box">

                    <div class="option-icon teach-icon">
                        <i class="fa-regular fa-lightbulb"></i>
                    </div>

                    <p><strong>I Want to Teach</strong></p>

                    <p>
                        Help others, share your expertise,
                        and earn volunteer hours.
                    </p>

                </div>

            </div>

            <!-- ================= ROLE ================= -->
            <div class="form-group full-width">

                <label for="role">University Role</label>

                <select id="role" name="role">
                    <option>Student</option>
                    <option>Professor</option>
                </select>

            </div>

            <!-- ================= SKILLS ================= -->
            <div class="form-group full-width">

                <label for="skills">Your Skills *</label>

                <div class="input-wrapper">

                    <i class="fa-regular fa-bookmark"></i>

                    <input
                            id="skills"
                            name="skills"
                            type="text"
                            placeholder="e.g., Java, UI Design, English (comma-separated)">

                </div>

                <small class="helper-text">
                    Separate multiple skills with commas
                </small>

            </div>

            <!-- ================= BIO ================= -->
            <div class="form-group full-width">

                <label for="bio">Bio</label>

                <textarea
                        id="bio"
                        name="bio"
                        placeholder="Tell others about yourself and your expertise..."></textarea>

            </div>

            <!-- ================= BUTTON ================= -->
            <button type="submit" class="register-btn">

                <i class="fa-solid fa-user-plus"></i>
                Create Account

            </button>

        </form>

        <!-- ================= LOGIN ================= -->
        <p class="auth-switch">
            Already have an account?
            <a href="login.php">Log in</a>
        </p>

    </div>

</main>

<!-- ================= FOOTER ================= -->
<?php include '../includes/footer.php'; ?>

<!-- ================= JS ================= -->
<script>

    const boxes = document.querySelectorAll('.option-box');

    boxes.forEach(box => {

        box.addEventListener('click', () => {

            boxes.forEach(b => {
                b.classList.remove('active');
            });

            box.classList.add('active');

        });

    });

</script>

</body>
</html>