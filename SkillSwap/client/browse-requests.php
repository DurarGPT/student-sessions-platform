<?php

session_start();

include '../includes/db.php';

?>

<!DOCTYPE html>
<html>

<head>
    <title>Browse Requests</title>
    <link rel="stylesheet" href="../assets/css/client_style.css">
</head>

<body>

<?php include '../includes/header.php'; ?>

<main class="browse-page">

    <section class="browse-hero">

        <h1>Browse Requests</h1>

        <p>
            Find requests matching your skills and help fellow students
        </p>

    </section>

    <section class="browse-content">

        <div class="browse-filter-row">

            <div class="search-box">
                <span>🔍</span>

                <input
                        type="text"
                        placeholder="Search by skill, description, or learner..."
                >
            </div>

            <div class="filter-buttons">

                <button class="filter-btn active" data-filter="all">
                    All
                </button>

                <button class="filter-btn" data-filter="one-on-one">
                    👥 One-on-One
                </button>

                <button class="filter-btn" data-filter="group">
                    👥 Group
                </button>

            </div>

        </div>

        <p class="request-count">
            Showing 3 of 3 requests
        </p>

        <div class="request-container">

            <div class="request-card" data-type="one-on-one">

                <div class="card-top">
                    <span class="skill-badge">UI Design</span>
                    <span class="session-type">one-on-one</span>
                </div>

                <h2>Reem Ali</h2>

                <p>
                    Looking to learn the basics of UI/UX design for my final project.
                    Need help with wireframing and prototyping.
                </p>

                <div class="request-info">
                    <p>🕒 Weekday evenings</p>
                    <p>🗓️ 5/2/2026</p>
                </div>

                <button class="accept-btn">Accept Request</button>

            </div>

            <div class="request-card" data-type="one-on-one">

                <div class="card-top">
                    <span class="skill-badge">Java</span>
                    <span class="session-type">one-on-one</span>
                </div>

                <h2>Ashwag Alghamdi</h2>

                <p>
                    Struggling with object-oriented programming concepts.
                    Need help understanding inheritance and polymorphism.
                </p>

                <div class="request-info">
                    <p>🕒 Weekend mornings</p>
                    <p>🗓️ 5/3/2026</p>
                </div>

                <button class="accept-btn">Accept Request</button>

            </div>

            <div class="request-card" data-type="one-on-one">

                <div class="card-top">
                    <span class="skill-badge">Public Speaking</span>
                    <span class="session-type">one-on-one</span>
                </div>

                <h2>Salwa Alzahrani</h2>

                <p>
                    Preparing for a conference presentation. Need guidance on
                    delivery and confidence building.
                </p>

                <div class="request-info">
                    <p>🕒 Flexible</p>
                    <p>🗓️ 5/1/2026</p>
                </div>

                <button class="accept-btn">Accept Request</button>

            </div>

        </div>

    </section>

</main>

<?php include '../includes/footer.php'; ?>

<script src="../assets/js/client.js"></script>

</body>

</html>