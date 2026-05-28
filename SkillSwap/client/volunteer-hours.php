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
    <title>SkillSwap | Volunteer Hours</title>

    <!-- Connect CSS file -->
    <link rel="stylesheet" href="../assets/css/client_style.css">
</head>

<!-- Body class used for page-specific styling -->
<body class="volunteer-page">


<!-- Include reusable shared header -->
<?php include '../includes/header.php'; ?>


<main class="volunteer-main">

    <!-- ================= PAGE TOP SECTION ================= -->
    <section class="volunteer-top">

        <!-- Left side title area -->
        <div>

            <!-- Main page title -->
            <h1>Volunteer Hours Tracking</h1>

            <!-- Short description -->
            <p>
                Official university volunteer hour tracking for SkillSwap
            </p>

        </div>


        <!-- Download report button -->
        <a href="#" class="download-report">
            ⬇️ Download Report
        </a>

    </section>


    <!-- ================= SUMMARY CARDS SECTION ================= -->
    <section class="volunteer-summary-grid">


        <!-- Approved hours card -->
        <div class="hours-card approved-card">

            <div class="card-top-line">

                <span class="hours-icon">🏅</span>

                <span class="status-mark">✓</span>

            </div>

            <h2>0</h2>

            <p>Approved Hours</p>

        </div>


        <!-- Pending approval card -->
        <div class="hours-card pending-card">

            <div class="card-top-line">

                <span class="hours-icon">🕒</span>

                <span class="status-pill">Pending</span>

            </div>

            <h2>0</h2>

            <p>Pending Approval</p>

        </div>


        <!-- Completed sessions card -->
        <div class="hours-card completed-card">

            <span class="hours-icon">📈</span>

            <h2>0</h2>

            <p>Completed Sessions</p>

        </div>


        <!-- Active sessions card -->
        <div class="hours-card active-card">

            <span class="hours-icon">📅</span>

            <h2>0</h2>

            <p>Active Sessions</p>

        </div>

    </section>


    <!-- ================= GOAL PROGRESS SECTION ================= -->
    <section class="volunteer-panel progress-panel">

        <!-- Section title -->
        <h2>

            <span class="panel-icon gold-text">🏅</span>

            Progress Towards Goal

        </h2>


        <!-- Goal progress row -->
        <div class="goal-row">

            <p>Volunteer Hours Goal: 100 hours</p>

            <strong>0 / 100</strong>

        </div>


        <!-- Progress bar -->
        <div class="progress-bar">

            <!-- Filled part of progress bar -->
            <div class="progress-fill"></div>

        </div>


        <!-- Progress note -->
        <p class="progress-note">
            0% complete • 100 hours remaining
        </p>

    </section>


    <!-- ================= MONTHLY HOURS SECTION ================= -->
    <section class="volunteer-panel month-panel">

        <!-- Section title -->
        <h2>

            <span class="panel-icon blue-text">📅</span>

            Hours Earned by Month

        </h2>


        <!-- Monthly statistics grid -->
        <div class="month-grid">


            <!-- January -->
            <div class="month-item">

                <strong>4</strong>

                <span>Jan</span>

            </div>


            <!-- February -->
            <div class="month-item">

                <strong>8</strong>

                <span>Feb</span>

            </div>


            <!-- March -->
            <div class="month-item">

                <strong>12</strong>

                <span>Mar</span>

            </div>


            <!-- April -->
            <div class="month-item">

                <strong>6</strong>

                <span>Apr</span>

            </div>


            <!-- May -->
            <div class="month-item">

                <strong>0</strong>

                <span>May</span>

            </div>

        </div>

    </section>


    <!-- ================= APPROVAL STATUS SECTION ================= -->
    <section class="approval-grid">


        <!-- Pending approval box -->
        <div class="small-panel">

            <h2>

                <span class="panel-icon orange-text">🕒</span>

                Pending Approval (0)

            </h2>

            <p>No pending sessions</p>

        </div>


        <!-- Approved sessions box -->
        <div class="small-panel">

            <h2>

                <span class="panel-icon green-text">✅</span>

                Approved Sessions (0)

            </h2>

            <p>No approved sessions yet</p>

        </div>

    </section>


    <!-- ================= SESSION HISTORY SECTION ================= -->
    <section class="volunteer-panel history-panel">


        <!-- Top row -->
        <div class="history-top">

            <!-- Section title -->
            <h2>

                <span class="panel-icon blue-text">📈</span>

                Session History

            </h2>


            <!-- Filter button -->
            <button type="button" class="filter-button">
                🔎 Filter
            </button>

        </div>


        <!-- Empty history state -->
        <div class="empty-history">

            <div class="empty-icon">🕒</div>

            <h3>No session history yet</h3>

            <p>
                Complete mentoring sessions to start earning volunteer hours
            </p>

        </div>

    </section>


    <!-- ================= ABOUT VOLUNTEER HOURS SECTION ================= -->
    <section class="about-hours-card">

        <!-- Section title -->
        <h2>

            <span>🏅</span>

            About Volunteer Hours

        </h2>


        <!-- Information list -->
        <ul>

            <li>
                All volunteer hours are officially tracked
                and verified by university administrators
            </li>

            <li>
                Approved hours can be used for scholarships,
                resumes, and graduation requirements
            </li>

            <li>
                Sessions must be confirmed by learners
                and approved by admins to count
            </li>

            <li>
                Download your official volunteer hours report
                anytime for your records
            </li>

        </ul>

    </section>

</main>


<!-- Include reusable shared footer -->
<?php include '../includes/footer.php'; ?>

<script src="../assets/js/script.js"></script>

</body>

</html>