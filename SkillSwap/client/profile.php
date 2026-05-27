<?php
global $pdo;
session_start();
require_once __DIR__ . '/../includes/db.php';

/* التحقق من تسجيل الدخول */

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];

/* جلب بيانات المستخدم */

$stmt = $pdo->prepare("
SELECT *
FROM users
WHERE user_id=?
");

$stmt->execute([$userId]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);


/* صورة افتراضية */

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

    <title>SkillSwap | Profile</title>

    <link
            rel="stylesheet"
            href="../assets/css/client_style.css">

</head>

<body>

<?php include '../includes/header.php'; ?>


<main class="profile-page">


    <!-- LEFT -->

    <div class="profile-card">

        <img
                src="<?php echo $profileImage; ?>"
                alt="Profile Photo">


        <h3>
            <?php echo $user['full_name']; ?>
        </h3>


        <p>
            <?php echo $user['role']; ?>
        </p>


        <p>
            📧
            <?php echo $user['email']; ?>
        </p>


        <p>
            ⏱ Volunteer Hours: 0
        </p>


        <button>

            📷 Change Photo

        </button>

    </div>



    <!-- RIGHT -->

    <div>


        <div class="profile-section">

            <h3>

                📝 About Me

            </h3>


            <p>

                <?php

                echo !empty($user['bio'])

                        ?

                        $user['bio']

                        :

                        "No bio added yet.";

                ?>

            </p>

        </div>



        <div class="profile-section">

            <h3>

                💡 My Skills

            </h3>


            <?php

            if (!empty($user['skills'])) {

                $skills =
                        explode(
                                ",",
                                $user['skills']
                        );

                foreach ($skills as $skill) {

                    echo
                            "<span class='skill-tag'>"
                            .
                            trim($skill)
                            .
                            "</span>";

                }

            }

            ?>

        </div>



        <div class="profile-section">

            <h3>

                ⚙️ Settings

            </h3>


            <form
                    action="update_profile.php"
                    method="POST"
                    enctype="multipart/form-data">


                <label>

                    Full Name

                </label>

                <input
                        type="text"
                        name="full_name"
                        value="<?php echo $user['full_name']; ?>">


                <label>

                    New Password

                </label>

                <input
                        type="password"
                        name="password">


                <label>

                    Upload New Photo

                </label>

                <input
                        type="file"
                        name="profile_image">


                <button
                        type="submit">

                    Save Changes

                </button>

            </form>

        </div>


    </div>

</main>


<?php include '../includes/footer.php'; ?>


</body>

</html>