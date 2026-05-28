<?php
global $pdo;

session_start();

require_once __DIR__ . '/../includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];

/* جلب بيانات المستخدم */

$stmt = $pdo->prepare("
SELECT *
FROM users
WHERE user_id = ?
");

$stmt->execute([$userId]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);


/* صورة البروفايل */

$profileImage =
        !empty($user['profile_image'])
                ?
                "../uploads/profile/" . $user['profile_image']
                :
                "../assets/images/default.png";

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

    <!-- HERO -->

    <section class="profile-hero">

        <h1>My Profile</h1>

        <p>
            Manage your account information and preferences
        </p>

    </section>



    <!-- MAIN LAYOUT -->

    <section class="profile-layout">


        <!-- LEFT SIDEBAR -->

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


                <!-- CHANGE PHOTO -->

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



            <!-- STATS -->

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





        <!-- RIGHT SIDE -->

        <section class="profile-right">


            <!-- BASIC INFO -->

            <div class="profile-card">

                <div class="profile-card-header">

                    <h3>

                        👤 Basic Information

                    </h3>


                    <button class="edit-profile-btn">

                        ✏ Edit Profile

                    </button>

                </div>



                <div class="profile-field">

                    <label>

                        Full Name

                    </label>

                    <p>

                        <?php echo htmlspecialchars($user['full_name']); ?>

                    </p>

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

                    <textarea disabled><?php

                        echo !empty($user['bio'])
                                ?
                                htmlspecialchars($user['bio'])
                                :
                                "No bio added yet.";

                        ?></textarea>

                </div>

            </div>





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

                            echo
                                    "<span class='profile-skill'>"
                                    .
                                    trim($skill)
                                    .
                                    "</span>";

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

<!-- ================= JS ================= -->

<script src="../assets/js/script.js"></script>

</body>

</html>