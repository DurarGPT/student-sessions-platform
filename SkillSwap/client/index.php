<!-- Durar's Part  -->

<?php
// Start session so PHP can track logged-in users
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
    <title>SkillSwap | Home</title>

    <!-- Connect CSS file -->
    <link rel="stylesheet" href="../assets/css/client_style.css">
</head>
<!-- Body class used for page-specific styling -->
<body class="home-page">


<!-- Include reusable shared header -->
<?php include '../includes/header.php'; ?>


<main>

    <!-- ================= HERO SECTION ================= -->
    <section class="home-hero">

        <div class="home-hero-content">

            <!-- Main hero title -->
            <h1>Learn. Teach. Earn.</h1>

            <!-- Hero description -->
            <p>
                Connect with mentors and learners across your university.
                Exchange skills, earn volunteer hours, and grow together.
            </p>


            <!-- ===== HERO BUTTONS ===== -->
            <div class="hero-buttons">

                <!-- Main CTA button -->
                <a href="register.php" class="primary-button">
                    Get Started
                    <span>&rarr;</span>
                </a>

                <!-- Browse requests button -->
                <a href="browse-requests.php" class="secondary-button">
                    Browse Requests
                </a>

            </div>

        </div>

    </section>


    <!-- ================= STATISTICS SECTION ================= -->
    <section class="home-stats-section">

        <div class="home-stats-grid">


            <!-- Sessions completed card -->
            <div class="home-stat-card">
                <div class="home-stat-icon">📖</div>
                <h2>45</h2>
                <p>Sessions Completed</p>
            </div>


            <!-- Volunteer hours card -->
            <div class="home-stat-card">
                <div class="home-stat-icon">🕒</div>
                <h2>147</h2>
                <p>Volunteer Hours</p>
            </div>


            <!-- Active mentors card -->
            <div class="home-stat-card">
                <div class="home-stat-icon">👥</div>
                <h2>4</h2>
                <p>Active Mentors</p>
            </div>


            <!-- Satisfaction rate card -->
            <div class="home-stat-card">
                <div class="home-stat-icon">🏅</div>
                <h2>98%</h2>
                <p>Satisfaction Rate</p>
            </div>

        </div>

    </section>


    <!-- ================= TOP REQUESTED SKILLS SECTION ================= -->
    <section class="requested-skills-section">

        <!-- Section heading -->
        <div class="section-heading">

            <h2>Top Requested Skills</h2>

            <p>
                Most in-demand skills students are learning
            </p>

        </div>


        <!-- Skills grid -->
        <div class="skills-grid">


            <!-- UI Design card -->
            <div class="skill-card">

                <div class="skill-info">

                    <span class="skill-icon lavender-bg">🎨</span>

                    <div>

                        <h3>UI Design</h3>

                        <p>24 requests</p>

                    </div>

                </div>

                <span class="trend-arrow">↗</span>

            </div>


            <!-- Java card -->
            <div class="skill-card">

                <div class="skill-info">

                    <span class="skill-icon cream-bg">☕</span>

                    <div>

                        <h3>Java</h3>

                        <p>19 requests</p>

                    </div>

                </div>

                <span class="trend-arrow">↗</span>

            </div>


            <!-- English speaking card -->
            <div class="skill-card">

                <div class="skill-info">

                    <span class="skill-icon sky-bg">💬</span>

                    <div>

                        <h3>English Speaking</h3>

                        <p>16 requests</p>

                    </div>

                </div>

                <span class="trend-arrow">↗</span>

            </div>


            <!-- Python card -->
            <div class="skill-card">

                <div class="skill-info">

                    <span class="skill-icon mint-bg">🐍</span>

                    <div>

                        <h3>Python</h3>

                        <p>14 requests</p>

                    </div>

                </div>

                <span class="trend-arrow">↗</span>

            </div>


            <!-- Data structures card -->
            <div class="skill-card">

                <div class="skill-info">

                    <span class="skill-icon indigo-bg">📊</span>

                    <div>

                        <h3>Data Structures</h3>

                        <p>12 requests</p>

                    </div>

                </div>

                <span class="trend-arrow">↗</span>

            </div>


            <!-- React card -->
            <div class="skill-card">

                <div class="skill-info">

                    <span class="skill-icon aqua-bg">⚛</span>

                    <div>

                        <h3>React</h3>

                        <p>11 requests</p>

                    </div>

                </div>

                <span class="trend-arrow">↗</span>

            </div>

        </div>

    </section>


    <!-- ================= TOP MENTORS SECTION ================= -->
    <section class="top-mentors-section">

        <!-- Section heading -->
        <div class="section-heading">

            <h2>Top Mentors This Month</h2>

            <p>
                Recognizing our most active community members
            </p>

        </div>


        <!-- Mentor leaderboard -->
        <div class="mentor-list">


            <!-- Mentor row -->
            <div class="mentor-row">

                <span class="mentor-rank">1</span>

                <span class="mentor-avatar">MC</span>

                <div class="mentor-info">

                    <h3>Dr. Michael Chen</h3>

                    <p>Professor</p>

                </div>

                <div class="mentor-hours">

                    <h4>58 hrs</h4>

                    <p>4 skills</p>

                </div>

            </div>


            <!-- Mentor row -->
            <div class="mentor-row">

                <span class="mentor-rank">2</span>

                <span class="mentor-avatar">SM</span>

                <div class="mentor-info">

                    <h3>Sarah Martinez</h3>

                    <p>Student</p>

                </div>

                <div class="mentor-hours">

                    <h4>32 hrs</h4>

                    <p>3 skills</p>

                </div>

            </div>


            <!-- Mentor row -->
            <div class="mentor-row">

                <span class="mentor-rank">3</span>

                <span class="mentor-avatar">EJ</span>

                <div class="mentor-info">

                    <h3>Emma Johnson</h3>

                    <p>Student</p>

                </div>

                <div class="mentor-hours">

                    <h4>24 hrs</h4>

                    <p>3 skills</p>

                </div>

            </div>


            <!-- Mentor row -->
            <div class="mentor-row">

                <span class="mentor-rank">4</span>

                <span class="mentor-avatar">JW</span>

                <div class="mentor-info">

                    <h3>James Wilson</h3>

                    <p>Student</p>

                </div>

                <div class="mentor-hours">

                    <h4>18 hrs</h4>

                    <p>3 skills</p>

                </div>

            </div>

        </div>

    </section>


    <!-- ================= CALL TO ACTION SECTION ================= -->
    <section class="green-cta">

        <!-- CTA title -->
        <h2>Ready to Start Your Journey?</h2>

        <!-- CTA description -->
        <p>
            Join hundreds of students and professors building skills together
        </p>

        <!-- CTA button -->
        <a href="register.php">
            Join SkillSwap Today
        </a>

    </section>

</main>


<!-- Include reusable shared footer -->
<?php include '../includes/footer.php'; ?>

<script src="../assets/js/script.js"></script>

</body>

</html>