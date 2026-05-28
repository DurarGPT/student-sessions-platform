<?php

session_start();

include '../includes/db.php';

$sql = "SELECT requests.*, users.full_name
        FROM requests
        LEFT JOIN users
        ON requests.user_id = users.user_id
        WHERE requests.status = 'open'
        ORDER BY requests.request_id DESC";

$stmt = $pdo->prepare($sql);

$stmt->execute();

$requests = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

        <h1>
            Browse Requests
        </h1>

        <p>
            Find requests matching your skills
        </p>

    </section>

    <section class="browse-content">

        <div class="browse-filter-row">

            <div class="search-box">

                <span>🔍</span>

                <input
                        type="text"
                        placeholder="Search requests..."
                >

            </div>

            <div class="filter-buttons">

                <button
                        class="filter-btn active"
                        data-filter="all"
                >
                    All
                </button>

                <button
                        class="filter-btn"
                        data-filter="one-on-one"
                >
                    👥 One-on-One
                </button>

                <button
                        class="filter-btn"
                        data-filter="group"
                >
                    👥 Group
                </button>

            </div>

        </div>

        <p class="request-count">

            Showing
            <?php echo count($requests); ?>
            of
            <?php echo count($requests); ?>
            requests

        </p>

        <div class="request-container">

            <?php foreach ($requests as $request) { ?>

                <?php
                $sessionType = $request['session_type'] ?? 'one-on-one';

                if ($sessionType == "") {
                    $sessionType = "one-on-one";
                }
                ?>

                <div
                        class="request-card"
                        data-type="<?php echo htmlspecialchars($sessionType); ?>"
                >

                    <div class="card-top">

                        <span class="skill-badge">

                            <?php echo htmlspecialchars($request['category']); ?>

                        </span>

                        <span class="session-type">

                            <?php echo htmlspecialchars($sessionType); ?>

                        </span>

                    </div>

                    <h2>

                        <?php
                        echo htmlspecialchars(
                                $request['full_name'] ?? 'Student'
                        );
                        ?>

                    </h2>

                    <p>

                        <?php
                        echo htmlspecialchars(
                                $request['description']
                        );
                        ?>

                    </p>

                    <div class="request-info">

                        <p>

                            🕒
                            <?php
                            echo htmlspecialchars(
                                    $request['preferred_time'] ?? ''
                            );
                            ?>

                        </p>

                        <p>

                            🗓️
                            <?php
                            echo htmlspecialchars(
                                    $request['preferred_date'] ?? ''
                            );
                            ?>

                        </p>

                    </div>

                    <a
                            href="Dashboard.php"
                            class="accept-btn"
                    >
                        Accept Request
                    </a>

                </div>

            <?php } ?>

        </div>

        <div class="no-results">

            <div class="no-results-icon">
                ▽
            </div>

            <h2>
                No requests found
            </h2>

            <p>
                Try adjusting your filters
            </p>

        </div>

    </section>

</main>

<?php include '../includes/footer.php'; ?>

<script src="../assets/js/script.js"></script>

</body>

</html>