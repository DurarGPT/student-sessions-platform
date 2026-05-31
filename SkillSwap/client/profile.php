<?php
global $pdo;

session_start();

require_once __DIR__ . '/../includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];

$stmt = $pdo->prepare("
SELECT *
FROM users
WHERE user_id = ?
");

$stmt->execute([$userId]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>SkillSwap | Profile</title>

    <link
            rel="stylesheet"
            href="../assets/css/client_style.css">

</head>

<body class="profile-page">

<?php include '../includes/header.php'; ?>

<main>

    <section class="profile-hero">

        <h1>My Profile</h1>

        <p>
            Manage your account information and preferences
        </p>

    </section>

    <section class="profile-layout">

        <aside class="profile-sidebar">

            <div class="profile-sidebar-top">

                <img
                        class="profile-image"
                        src="<?php
                        if (empty($user['profile_image']) || $user['profile_image'] === 'default.png') {
                            echo '../assets/images/default.png';
                        } else {
                            echo '../uploads/profile/' . htmlspecialchars($user['profile_image']);
                        }
                        ?>"
                        alt="Profile Photo">

                <span class="verified-badge">
                    ✔ Verified Mentor
                </span>

                <h2>
                    <?php echo htmlspecialchars($user['full_name']); ?>
                </h2>

                <p class="profile-role">
                    <?php echo htmlspecialchars($user['role']); ?>
                </p>

                <form
                        id="profile-photo-form"
                        action="../includes/update_profile.php"
                        method="POST"
                        enctype="multipart/form-data">

                    <label class="change-photo-button">

                        📷 Change Photo

                        <input
                                id="profile-photo-input"
                                type="file"
                                name="profile_image"
                                accept="image/*"
                                hidden>

                    </label>

                </form>

            </div>

            <div class="profile-stats">

                <div class="profile-stat">

                    <span>Volunteer Hours</span>

                    <strong>
                        <?php echo htmlspecialchars($user['volunteer_hours'] ?? 0); ?>
                    </strong>

                </div>

                <div class="profile-stat">

                    <span>Skills</span>

                    <strong>
                        <?php
                        echo !empty($user['skills'])
                                ?
                                count(array_filter(array_map('trim', explode(",", $user['skills']))))
                                :
                                0;
                        ?>
                    </strong>

                </div>

                <div class="profile-stat">

                    <span>Member Since</span>

                    <strong>
                        <?php echo !empty($user['created_at']) ? date("Y", strtotime($user['created_at'])) : date("Y"); ?>
                    </strong>

                </div>

            </div>

        </aside>

        <section class="profile-right">

            <!-- BASIC INFO -->

            <form
                    class="profile-card profile-edit-form"
                    action="../includes/update_profile.php"
                    method="POST">

                <div class="profile-card-header">

                    <h3>
                        👤 Basic Information
                    </h3>

                    <button
                            type="button"
                            class="edit-profile-btn">

                        ✏ Edit Profile

                    </button>

                </div>

                <div class="profile-field">

                    <label>
                        Full Name
                    </label>

                    <input
                            type="text"
                            name="full_name"
                            value="<?php echo htmlspecialchars($user['full_name']); ?>"
                            disabled>

                </div>

                <div class="profile-field">

                    <label>
                        University Email
                    </label>

                    <input
                            type="text"
                            value="<?php echo htmlspecialchars($user['email']); ?>"
                            disabled>

                    <small>
                        Email cannot be changed
                    </small>

                </div>

                <div class="profile-field">

                    <label>
                        Role
                    </label>

                    <span class="role-badge">
                        <?php echo htmlspecialchars($user['role']); ?>
                    </span>

                </div>

                <div class="profile-field">

                    <label>
                        Bio / About Me
                    </label>

                    <textarea
                            name="bio"
                            disabled><?php
                        echo !empty($user['bio'])
                                ?
                                htmlspecialchars($user['bio'])
                                :
                                "No bio added yet.";
                        ?></textarea>

                </div>

                <div class="profile-field">

                    <label>
                        Skills
                    </label>

                    <div class="skill-add-row profile-skill-add-row">

                        <input
                                id="profile-skill-input"
                                class="profile-skill-input"
                                type="text"
                                placeholder="e.g., Java"
                                disabled>

                        <button
                                type="button"
                                class="add-skill-btn profile-add-skill-btn"
                                disabled>
                            +
                        </button>

                    </div>

                    <input
                            type="hidden"
                            name="skills"
                            class="skills-hidden"
                            value="<?php echo htmlspecialchars($user['skills'] ?? ''); ?>">

                    <div
                            class="selected-skills profile-selected-skills"
                            data-skills="<?php echo htmlspecialchars($user['skills'] ?? ''); ?>">
                    </div>

                    <small>
                        Add each skill separately using the + button
                    </small>

                </div>

                <input
                        type="hidden"
                        name="update_profile"
                        value="1">

            </form>

            <!-- SKILLS -->

            <div class="profile-card">

                <h3>
                    📘 My Skills
                </h3>

                <div class="skills-wrapper">

                    <?php

                    if (!empty($user['skills'])) {

                        $skills = explode(",", $user['skills']);

                        foreach ($skills as $skill) {

                            if (trim($skill) !== '') {

                                echo
                                        "<span class='profile-skill'>"
                                        .
                                        htmlspecialchars(trim($skill))
                                        .
                                        "</span>";

                            }

                        }

                    }

                    ?>

                </div>

            </div>

            <!-- SESSION -->

            <div class="profile-card">

                <h3>
                    📅 Session Preferences
                </h3>

                <div class="profile-field">

                    <label>
                        Availability
                    </label>

                    <input
                            type="text"
                            value="Weekday evenings, Weekend mornings"
                            disabled>

                </div>

                <div class="profile-field">

                    <label>
                        Session Type Preference
                    </label>

                    <input
                            type="text"
                            value="Both one-on-one and group sessions"
                            disabled>

                </div>

            </div>

            <!-- SETTINGS -->

            <div class="profile-card">

                <h3>
                    🔒 Security & Settings
                </h3>

                <button
                        type="button"
                        class="settings-button change-password-toggle">

                    🔑 Change Password

                </button>

                <form
                        class="change-password-form"
                        action="../includes/update_profile.php"
                        method="POST">

                    <input
                            type="password"
                            name="password"
                            placeholder="Enter new password"
                            minlength="6"
                            required>

                    <button
                            type="submit"
                            class="settings-button save-password-button">

                        ✓ Save Password

                    </button>

                </form>

                <button
                        type="button"
                        class="settings-button email-toggle-btn">

                    ✉ Email Notifications: ON

                </button>

            </div>

        </section>

    </section>

</main>

<?php include '../includes/footer.php'; ?>

<script src="../assets/js/script.js"></script>

</body>

</html>