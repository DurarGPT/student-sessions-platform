<?php

session_start();

include 'includes/db.php';

?>

<!DOCTYPE html>
<html>

<head>

    <title>Post Request</title>

    <link rel="stylesheet" href="../assets/css/client_style.css">

</head>

<body>

<?php include '../includes/header.php'; ?>

<!-- ================= (post request page -balqees) ================= -->

<main>

    <h1 class="page-title">Post a Learning Request</h1>

    <form class="request-form" method="POST">

        <label>Skill Needed</label>

        <input
                type="text"
                name="title"
                placeholder="Enter skill"
        >

        <label>Description</label>

        <textarea
                name="description"
                placeholder="Describe your learning request"
        ></textarea>

        <label>Category</label>

        <select name="category">

            <option>Programming</option>
            <option>Design</option>
            <option>Languages</option>
            <option>Business</option>

        </select>

        <label>Level</label>

        <select name="level">

            <option>Beginner</option>
            <option>Intermediate</option>
            <option>Advanced</option>

        </select>

        <label>Preferred Date</label>

        <input
                type="date"
                name="preferred_date"
        >

        <button class="post-btn" type="submit">

            Post Request

        </button>

    </form>

</main>

<?php include '../includes/footer.php'; ?>

</body>

</html>