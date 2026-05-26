<?php

session_start();

include 'includes/db.php';

?>

<!DOCTYPE html>
<html>

<head>

    <title>Browse Requests</title>

    <link rel="stylesheet" href="../assets/css/client_style.css">

</head>

<body>

<?php include 'includes/header.php'; ?>

<!-- ================= (browse request page -balqees) ================= -->

<main>

    <h1 class="page-title">Browse Learning Requests</h1>

    <!-- Search + Filter -->

    <div class="search-filter">

        <input type="text" placeholder="Search skills...">

        <select>

            <option>All Categories</option>
            <option>Programming</option>
            <option>Design</option>
            <option>Languages</option>

        </select>

    </div>

    <!-- Request Cards -->

    <div class="request-container">

        <!-- Card 1 -->

        <div class="request-card">

            <span class="status-open">Open</span>

            <h2>Java Programming Help</h2>

            <p>
                Looking for help understanding Java OOP concepts
                and inheritance.
            </p>

            <span class="skill-tag">Programming</span>

            <br>

            <button class="request-btn">
                View Details
            </button>

        </div>

        <!-- Card 2 -->

        <div class="request-card">

            <span class="status-open">Open</span>

            <h2>UI/UX Design Basics</h2>

            <p>
                Need help learning Figma wireframes
                and prototyping basics.
            </p>

            <span class="skill-tag">Design</span>

            <br>

            <button class="request-btn">
                View Details
            </button>

        </div>

        <!-- Card 3 -->

        <div class="request-card">

            <span class="status-closed">Closed</span>

            <h2>English Conversation Practice</h2>

            <p>
                Looking for someone to practice speaking
                and presentation skills with.
            </p>

            <span class="skill-tag">Languages</span>

            <br>

            <button class="request-btn">
                View Details
            </button>

        </div>

    </div>

</main>

<?php include 'includes/footer.php'; ?>

</body>

</html>