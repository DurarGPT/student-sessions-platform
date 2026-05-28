<?php

session_start();

include '../includes/db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_SESSION['user_id'] ?? null;

    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $level = $_POST['level'];
    $preferred_date = $_POST['preferred_date'];
    $preferred_time = $_POST['preferred_time'];
    $session_type = $_POST['session_type'];

    $sql = "INSERT INTO requests
            (user_id, title, description, category, level,
             preferred_date, preferred_time, session_type, status)
            VALUES
            (:user_id, :title, :description, :category, :level,
             :preferred_date, :preferred_time, :session_type, 'open')";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([

            ':user_id' => $user_id,
            ':title' => $title,
            ':description' => $description,
            ':category' => $category,
            ':level' => $level,
            ':preferred_date' => $preferred_date,
            ':preferred_time' => $preferred_time,
            ':session_type' => $session_type

    ]);

    $message = "Request posted successfully!";
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Post Request</title>

    <link rel="stylesheet" href="../assets/css/client_style.css">

</head>

<body>

<?php include '../includes/header.php'; ?>

<main>

    <section class="post-hero">

        <h1 class="page-title">
            Post a Learning Request
        </h1>

        <p>
            Tell us what skill you want to learn
        </p>

    </section>

    <section class="post-wrapper">

        <form class="request-form" method="POST">

            <h2>
                Request Details
            </h2>

            <?php if ($message != "") { ?>

                <p class="success-message">
                    <?php echo $message; ?>
                </p>

            <?php } ?>

            <label>
                Skill You Want to Learn *
            </label>

            <input
                    type="text"
                    name="title"
                    placeholder="e.g. UI Design, Java, Public Speaking"
            >

            <div class="popular-tags">

                <span>UI Design</span>
                <span>Java</span>
                <span>Python</span>
                <span>React</span>
                <span>English Speaking</span>
                <span>Data Structures</span>

            </div>

            <label>
                Description *
            </label>

            <textarea
                    name="description"
                    placeholder="Describe what you want to learn..."
            ></textarea>

            <label>
                Preferred Time *
            </label>

            <input
                    type="text"
                    name="preferred_time"
                    placeholder="e.g. Weekday evenings"
            >

            <label>
                Category
            </label>

            <select name="category">

                <option>Programming</option>
                <option>Design</option>
                <option>Languages</option>
                <option>Business</option>
                <option>Public Speaking</option>

            </select>

            <label>
                Level
            </label>

            <select name="level">

                <option>Beginner</option>
                <option>Intermediate</option>
                <option>Advanced</option>

            </select>

            <label>
                Preferred Date
            </label>

            <input
                    type="date"
                    name="preferred_date"
            >

            <label>
                Session Type *
            </label>

            <div class="session-options">

                <label class="session-card active">

                    <input
                            type="radio"
                            name="session_type"
                            value="one-on-one"
                            checked
                    >

                    <div>

                        <h3>
                            One-on-One
                        </h3>

                        <p>
                            Personalized mentoring
                        </p>

                    </div>

                </label>

                <label class="session-card">

                    <input
                            type="radio"
                            name="session_type"
                            value="group"
                    >

                    <div>

                        <h3>
                            Group Session
                        </h3>

                        <p>
                            Learn with others
                        </p>

                    </div>

                </label>

            </div>

            <div class="info-box">

                <h3>
                    What happens next?
                </h3>

                <p>
                    ✓ Mentors will receive your request
                </p>

                <p>
                    ✓ They can accept the request
                </p>

                <p>
                    ✓ Then you can start chatting
                </p>

            </div>

            <button class="post-btn" type="submit">

                Post Request

            </button>

        </form>

    </section>

</main>

<?php include '../includes/footer.php'; ?>

<script src="../assets/js/script.js"></script>

</body>

</html>