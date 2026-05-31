<?php
global $pdo;
session_start();
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $role = strtolower($_POST['role']);
    $skills = trim($_POST['skills']);
    $bio = trim($_POST['bio']);

    if ($password !== $confirm) {
        $error = "Passwords do not match.";
    } else {

        $check = $pdo->prepare("SELECT user_id FROM users WHERE email = ?");
        $check->execute([$email]);

        if ($check->fetch()) {
            $error = "This email is already registered.";
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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SkillSwap | Register</title>

    <link rel="stylesheet" href="../assets/css/client_style.css">
    <link rel="stylesheet" href="../assets/css/auth.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<?php include '../includes/header.php'; ?>

<main class="register-page">

    <div class="register-header">
        <h1>Join SkillSwap</h1>
        <p>Start learning and teaching today</p>
    </div>

    <div class="register-card">

        <h2>Create Your Account</h2>

        <?php if (!empty($error)): ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form class="register-form" method="POST" action="">

            <div class="form-row">

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

            <div class="form-row">

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

                    <small class="password-error"></small>
                </div>

            </div>

            <label>What brings you to SkillSwap? *</label>

            <div class="option-boxes">

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

            <div class="form-group full-width">
                <label for="role">University Role</label>

                <select id="role" name="role">
                    <option>Student</option>
                    <option>Professor</option>
                </select>
            </div>

            <div class="form-group full-width">
                <label for="skill-input">Your Skills *</label>

                <div class="skill-add-row">
                    <div class="input-wrapper skill-input-wrapper">
                        <i class="fa-regular fa-bookmark"></i>

                        <input
                                id="skill-input"
                                class="skill-input"
                                type="text"
                                placeholder="e.g., Java">
                    </div>

                    <button
                            type="button"
                            class="add-skill-btn"
                            aria-label="Add skill">
                        +
                    </button>
                </div>

                <input
                        id="skills"
                        class="skills-hidden"
                        name="skills"
                        type="hidden">

                <div class="selected-skills" id="selected-skills"></div>

                <small class="helper-text">
                    Add each skill separately using the + button
                </small>
            </div>

            <div class="form-group full-width">
                <label for="bio">Bio</label>

                <textarea
                        id="bio"
                        name="bio"
                        placeholder="Tell others about yourself and your expertise..."></textarea>
            </div>

            <button type="submit" class="register-btn">
                <i class="fa-solid fa-user-plus"></i>
                Create Account
            </button>

        </form>

        <p class="auth-switch">
            Already have an account?
            <a href="login.php">Log in</a>
        </p>

    </div>

</main>

<?php include '../includes/footer.php'; ?>

<script src="../assets/js/script.js"></script>

</body>
</html>