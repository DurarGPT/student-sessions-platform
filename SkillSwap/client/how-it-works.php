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
    <title>SkillSwap | How It Works</title>

    <!-- Connect CSS file -->
    <link rel="stylesheet" href="../assets/css/client_style.css">
</head>

<!-- Body class used for page-specific CSS -->
<body class="how-page">


<!-- Include reusable shared header -->
<?php include '../includes/header.php'; ?>


<main>

    <!-- ================= HERO SECTION ================= -->
    <section class="how-hero">

        <div class="wide-container">

            <!-- Main page title -->
            <h1>How It Works</h1>

            <!-- Short page description -->
            <p>
                Five simple steps to start learning, teaching, and earning volunteer hours
            </p>

        </div>

    </section>


    <!-- ================= FIVE STEP TIMELINE ================= -->
    <section class="steps-section">

        <div class="steps-timeline">


            <!-- ===== STEP 1 ===== -->
            <article class="work-step">

                <!-- Step icon -->
                <div class="step-icon step-blue">👤</div>

                <div class="step-content">

                    <!-- Step title row -->
                    <div class="step-title-row">

                        <!-- Step number label -->
                        <span class="step-label step-blue">Step 1</span>

                        <!-- Step title -->
                        <h2>Create Your Profile</h2>

                    </div>

                    <!-- Step description -->
                    <p>
                        Sign up as a student or professor. List your skills and what you want to learn.
                    </p>

                    <!-- Step details -->
                    <ul class="step-details">

                        <li>Add your university email</li>

                        <li>Select your role (student/professor)</li>

                        <li>List your expertise and interests</li>

                        <li>Upload a profile photo</li>

                    </ul>

                </div>

            </article>


            <!-- ===== STEP 2 ===== -->
            <article class="work-step">

                <div class="step-icon step-green">📄</div>

                <div class="step-content">

                    <div class="step-title-row">

                        <span class="step-label step-green">Step 2</span>

                        <h2>Post or Browse Requests</h2>

                    </div>

                    <p>
                        Post a request to learn a skill, or browse existing requests to help others.
                    </p>

                    <ul class="step-details">

                        <li>Describe what you want to learn</li>

                        <li>Specify preferred times</li>

                        <li>Choose one-on-one or group sessions</li>

                        <li>Browse requests matching your skills</li>

                    </ul>

                </div>

            </article>


            <!-- ===== STEP 3 ===== -->
            <article class="work-step">

                <div class="step-icon step-purple">🔔</div>

                <div class="step-content">

                    <div class="step-title-row">

                        <span class="step-label step-purple">Step 3</span>

                        <h2>Get Matched</h2>

                    </div>

                    <p>
                        Receive notifications when your skills match a request,
                        or when someone accepts yours.
                    </p>

                    <ul class="step-details">

                        <li>Automatic notifications for skill matches</li>

                        <li>Review request details in your inbox</li>

                        <li>Accept requests that fit your schedule</li>

                        <li>Only one mentor per request</li>

                    </ul>

                </div>

            </article>


            <!-- ===== STEP 4 ===== -->
            <article class="work-step">

                <div class="step-icon step-orange">✅</div>

                <div class="step-content">

                    <div class="step-title-row">

                        <span class="step-label step-orange">Step 4</span>

                        <h2>Conduct Session</h2>

                    </div>

                    <p>
                        Meet via Microsoft Teams or in person.
                        Share knowledge and learn together.
                    </p>

                    <ul class="step-details">

                        <li>Schedule at your convenience</li>

                        <li>Use Teams, Zoom, or meet in person</li>

                        <li>Flexible session duration</li>

                        <li>Interactive learning experience</li>

                    </ul>

                </div>

            </article>


            <!-- ===== STEP 5 ===== -->
            <article class="work-step">

                <div class="step-icon step-indigo">🏅</div>

                <div class="step-content">

                    <div class="step-title-row">

                        <span class="step-label step-indigo">Step 5</span>

                        <h2>Earn Recognition</h2>

                    </div>

                    <p>
                        After completion, learners confirm and admins approve volunteer hours.
                    </p>

                    <ul class="step-details">

                        <li>Learner confirms session completion</li>

                        <li>Mentor submits hours for approval</li>

                        <li>Admin verifies and approves</li>

                        <li>Hours added to your profile</li>

                    </ul>

                </div>

            </article>

        </div>

    </section>


    <!-- ================= SESSION TYPES SECTION ================= -->
    <section class="session-types-section">

        <!-- Section title -->
        <h2>Session Types</h2>

        <div class="session-grid">


            <!-- One-on-one session card -->
            <article class="session-card">

                <h3>One-on-One Sessions</h3>

                <p>
                    Personalized mentoring with focused attention
                    and customized learning pace.
                </p>

                <ul>

                    <li>Tailored to your specific needs</li>

                    <li>Flexible scheduling</li>

                    <li>Direct feedback and guidance</li>

                </ul>

            </article>


            <!-- Group session card -->
            <article class="session-card">

                <h3>Group Sessions</h3>

                <p>
                    Learn alongside peers with shared interests
                    and collaborative problem-solving.
                </p>

                <ul>

                    <li>Peer learning opportunities</li>

                    <li>Build study groups</li>

                    <li>Network with classmates</li>

                </ul>

            </article>

        </div>

    </section>


    <!-- ================= COMMON QUESTIONS SECTION ================= -->
    <section class="questions-section">

        <!-- Section title -->
        <h2>Common Questions</h2>

        <div class="question-list">


            <!-- Question card -->
            <article class="question-card">

                <h3>How do I become a verified mentor?</h3>

                <p>
                    After registering, you can apply for mentor verification
                    through your dashboard. An admin will review your skills
                    and approve your mentor status.
                </p>

            </article>


            <!-- Question card -->
            <article class="question-card">

                <h3>Are volunteer hours officially recognized?</h3>

                <p>
                    Yes! All hours are approved by university administrators
                    and can be used for scholarships, resumes,
                    and graduation requirements.
                </p>

            </article>


            <!-- Question card -->
            <article class="question-card">

                <h3>Can I request multiple skills at once?</h3>

                <p>
                    Yes, you can post separate requests for different skills.
                    Each request can be accepted by one mentor.
                </p>

            </article>

        </div>

    </section>


    <!-- ================= CALL TO ACTION SECTION ================= -->
    <section class="blue-cta">

        <!-- CTA title -->
        <h2>Ready to Get Started?</h2>

        <!-- CTA description -->
        <p>
            Join SkillSwap today and start your learning journey
        </p>

        <!-- CTA button -->
        <a href="register.php">Create Your Account</a>

    </section>

</main>


<!-- Include reusable shared footer -->
<?php include '../includes/footer.php'; ?>


</body>

</html>