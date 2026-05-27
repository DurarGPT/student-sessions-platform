<!-- Durar's Part  -->

<?php
// Start session so PHP can remember logged-in users
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Character encoding -->
    <meta charset="UTF-8">

    <!-- Makes website responsive on phones -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Browser tab title -->
    <title>SkillSwap | About</title>

    <!-- Connect CSS file -->
    <link rel="stylesheet" href="../assets/css/client_style.css">
</head>

<!-- Body class for page-specific styling -->
<body class="about-page">

<!-- Include reusable header -->
<?php include '../includes/header.php'; ?>

<main>

    <!-- ================= ABOUT HERO SECTION ================= -->
    <section class="about-hero">

        <div class="wide-container">

            <!-- Main page title -->
            <h1>About SkillSwap</h1>

            <!-- Short description -->
            <p>
                Empowering university communities through peer-to-peer mentoring and skill exchange
            </p>

        </div>

    </section>


    <!-- ================= MISSION SECTION ================= -->
    <section class="mission-section">

        <div class="mission-content">

            <!-- Section title -->
            <h2>Our Mission</h2>

            <!-- Mission paragraph -->
            <p>
                SkillSwap was created to bridge the knowledge gap within our university community.
                We believe that every student and professor has valuable skills to share and areas
                where they can grow. By creating a structured platform for peer mentoring, we're
                building a culture of collaboration, continuous learning, and mutual support.
            </p>

        </div>


        <!-- ================= VALUES CARDS ================= -->
        <div class="values-grid">

            <!-- Community card -->
            <div class="value-card">

                <div class="value-icon blue-value">👥</div>

                <h3>Community</h3>

                <p>
                    Building connections across departments and disciplines
                </p>

            </div>


            <!-- Growth card -->
            <div class="value-card">

                <div class="value-icon green-value">🎯</div>

                <h3>Growth</h3>

                <p>
                    Fostering continuous learning and skill development
                </p>

            </div>


            <!-- Recognition card -->
            <div class="value-card">

                <div class="value-icon purple-value">🏅</div>

                <h3>Recognition</h3>

                <p>
                    Rewarding mentors with verified volunteer hours
                </p>

            </div>


            <!-- Support card -->
            <div class="value-card">

                <div class="value-icon orange-value">🧡</div>

                <h3>Support</h3>

                <p>
                    Creating a safe space for learning and teaching
                </p>

            </div>

        </div>

    </section>


    <!-- ================= UNIVERSITY INTEGRATION SECTION ================= -->
    <section class="integration-section">

        <!-- Section title -->
        <h2>University Integration</h2>

        <div class="info-card-list">

            <!-- Volunteer tracking card -->
            <article class="info-card">

                <h3>Official Volunteer Hour Tracking</h3>

                <p>
                    All mentoring sessions are logged and verified by university administrators.
                    Volunteer hours earned through SkillSwap are officially recognized and can be used for:
                </p>

                <!-- Benefits list -->
                <ul>

                    <li>Scholarship applications and academic honors</li>

                    <li>Resume building and career development</li>

                    <li>Community service graduation requirements</li>

                    <li>Leadership program qualifications</li>

                </ul>

            </article>


            <!-- Mentor verification card -->
            <article class="info-card">

                <h3>Mentor Verification System</h3>

                <p>
                    To ensure quality mentoring, all mentors go through a verification process.
                    Students and professors can apply to become verified mentors by demonstrating
                    proficiency in their chosen skills. This ensures learners receive guidance from
                    qualified individuals who are passionate about sharing their expertise.
                </p>

            </article>


            <!-- Flexible sessions card -->
            <article class="info-card">

                <h3>Flexible Session Formats</h3>

                <p>
                    SkillSwap supports both one-on-one and group mentoring sessions. Sessions are
                    conducted outside the platform using tools like Microsoft Teams, allowing for
                    flexible scheduling and personalized learning experiences. This hybrid approach
                    combines the convenience of digital coordination with real-time interaction.
                </p>

            </article>

        </div>

    </section>


    <!-- ================= IMPACT SECTION ================= -->
    <section class="impact-section">

        <!-- Section title -->
        <h2>Our Impact</h2>

        <div class="impact-grid">

            <!-- Active students -->
            <div>

                <h3>500+</h3>

                <p>Active Students</p>

            </div>


            <!-- Sessions completed -->
            <div>

                <h3>2,400+</h3>

                <p>Sessions Completed</p>

            </div>


            <!-- Skills offered -->
            <div>

                <h3>50+</h3>

                <p>Skills Offered</p>

            </div>

        </div>

    </section>

</main>


<!-- Include reusable footer -->
<?php include '../includes/footer.php'; ?>
<script src="../assets/js/script.js"></script>

</body>

</html>