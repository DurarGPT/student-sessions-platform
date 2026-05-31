<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentDir = str_replace('\\\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$baseUrl = preg_replace('#/(client|admin)$#', '', $currentDir);
$baseUrl = rtrim($baseUrl, '/');

$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
?>

<link
        rel="stylesheet"
        href="<?php echo $baseUrl; ?>/assets/css/client_style.css"
/>

<link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
/>

<header class="site-header">

    <!-- LEFT SIDE -->
    <div class="header-left">

        <!-- LOGO -->
        <h1 class="header-logo">

            <img src="<?php echo $baseUrl; ?>/assets/images/skillswap-logo.png"
                 alt="SkillSwap Logo"
                 class="header-logo-img">

            SkillSwap

        </h1>

        <!-- NAVIGATION -->
        <nav>

            <a href="<?php echo $baseUrl; ?>/client/index.php">Home</a>

            <a href="<?php echo $baseUrl; ?>/client/about.php">About</a>

            <a href="<?php echo $baseUrl; ?>/client/how-it-works.php">How It Works</a>

            <a href="<?php echo $baseUrl; ?>/client/browse-requests.php">Browse Requests</a>

            <a href="<?php echo $baseUrl; ?>/client/contact.php">Contact</a>

        </nav>

    </div>


    <!-- RIGHT SIDE -->
    <div class="header-right">

        <?php if(isset($_SESSION['user_id'])): ?>

            <a href="<?php echo $baseUrl; ?>/client/inbox.php" class="notification-link">
                <i class="fa-regular fa-bell"></i>
            </a>

            <a href="<?php echo $baseUrl; ?>/client/profile.php">Profile</a>

            <?php if($isAdmin): ?>

                <a href="<?php echo $baseUrl; ?>/admin/admin.php">Dashboard</a>

            <?php else: ?>

                <a href="<?php echo $baseUrl; ?>/client/Dashboard.php">Dashboard</a>

            <?php endif; ?>

            <a href="<?php echo $baseUrl; ?>/client/post-request.php">Post Request</a>

            <a href="<?php echo $baseUrl; ?>/client/logout.php">Logout</a>

        <?php else: ?>

            <a href="<?php echo $baseUrl; ?>/client/login.php">Login</a>

            <a href="<?php echo $baseUrl; ?>/client/register.php">Sign Up</a>

        <?php endif; ?>

    </div>

</header>
