<?php

session_start();

include '../includes/db.php';

?>

<!DOCTYPE html>
<html>

<head>

    <title>Post Request</title>

    <link rel="stylesheet" href="../assets/css/client_style.css">

</head>

<body>

<?php include '../includes/header.php'; ?>

<!-- ================= POST REQUEST PAGE ================= -->

<main>

    <!-- HERO SECTION -->

    <section class="post-hero">

        <h1 class="page-title">
            Post a Learning Request
        </h1>

        <p>
            Tell us what skill you want to learn
        </p>

    </section>



    <!-- FORM SECTION -->

    <section class="post-wrapper">

        <form class="request-form" method="POST">

            <h2>
                Request Details
            </h2>



            <!-- SKILL INPUT -->

            <label>
                Skill You Want to Learn *
            </label>

            <input
                    type="text"
                    name="title"
                    placeholder="e.g. UI Design, Java, Public Speaking"
            >



            <!-- POPULAR TAGS -->

            <div class="popular-tags">

                <span>UI Design</span>
                <span>Java</span>
                <span>Python</span>
                <span>React</span>
                <span>English Speaking</span>
                <span>Data Structures</span>
                <span>Photography</span>
                <span>Public Speaking</span>

            </div>



            <!-- DESCRIPTION -->

            <label>
                Description *
            </label>

            <textarea
                    name="description"
                    placeholder="Describe what you want to learn and any specific topics you need help with..."
            ></textarea>

            <small>
                Be specific about your learning goals and current skill level
            </small>



            <!-- PREFERRED TIME -->

            <label>
                Preferred Time *
            </label>

            <input
                    type="text"
                    name="preferred_time"
                    placeholder="e.g. Weekday evenings, Weekend mornings, Flexible"
            >



            <!-- CATEGORY -->

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



            <!-- LEVEL -->

            <label>
                Level
            </label>

            <select name="level">

                <option>Beginner</option>
                <option>Intermediate</option>
                <option>Advanced</option>

            </select>



            <!-- DATE -->

            <label>
                Preferred Date
            </label>

            <input
                    type="date"
                    name="preferred_date"
            >



            <!-- SESSION TYPE -->

            <label>
                Session Type *
            </label>

            <div class="session-options">

                <!-- ONE ON ONE -->

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
                            Personalized mentoring with individual attention
                        </p>

                    </div>

                </label>



                <!-- GROUP -->

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
                            Learn together with others who share your goals
                        </p>

                    </div>

                </label>

            </div>



            <!-- INFO BOX -->

            <div class="info-box">

                <h3>
                    What happens next?
                </h3>

                <p>
                    ✓ Verified mentors with this skill will be notified
                </p>

                <p>
                    ✓ They can review your request and accept it
                </p>

                <p>
                    ✓ Once accepted, you'll coordinate the session details
                </p>

                <p>
                    ✓ Sessions are conducted via Teams or in person
                </p>

            </div>



            <!-- BUTTON -->

            <button class="post-btn" type="submit">

                Post Request

            </button>

        </form>

    </section>

</main>

<?php include '../includes/footer.php'; ?>

<script src="../assets/js/client.js"></script>

</body>

</html>