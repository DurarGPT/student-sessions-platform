<link
        rel="stylesheet"
        href="/student-sessions-platform/SkillSwap/assets/css/client_style.css"
/>

<link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
/>

<?php
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
?>

<header class="site-header">

    <!-- LEFT SIDE -->
    <div class="header-left">

        <!-- LOGO -->
        <h1 class="header-logo">

            <img src="/student-sessions-platform/SkillSwap/assets/images/skillswap-logo.png"
                 alt="SkillSwap Logo"
                 class="header-logo-img">

            SkillSwap

        </h1>

        <!-- NAVIGATION -->
        <nav>

            <a href="/student-sessions-platform/SkillSwap/client/index.php">Home</a>

            <a href="/student-sessions-platform/SkillSwap/client/about.php">About</a>

            <a href="/student-sessions-platform/SkillSwap/client/how-it-works.php">How It Works</a>

            <a href="/student-sessions-platform/SkillSwap/client/browse-requests.php">Browse Requests</a>

            <a href="/student-sessions-platform/SkillSwap/client/contact.php">Contact</a>

        </nav>

    </div>


    <!-- RIGHT SIDE -->
    <div class="header-right">

        <?php if(isset($_SESSION['user_id'])): ?>

            <a href="/student-sessions-platform/SkillSwap/client/inbox.php" class="notification-link">
                <i class="fa-regular fa-bell"></i>
            </a>

            <a href="/student-sessions-platform/SkillSwap/client/profile.php">Profile</a>

            <?php if($isAdmin): ?>

                <a href="/student-sessions-platform/SkillSwap/admin/admin.php">Dashboard</a>

            <?php else: ?>

                <a href="/student-sessions-platform/SkillSwap/client/Dashboard.php">Dashboard</a>

            <?php endif; ?>

            <a href="/student-sessions-platform/SkillSwap/client/post-request.php">Post Request</a>

            <a href="/student-sessions-platform/SkillSwap/client/logout.php">Logout</a>

        <?php else: ?>

            <a href="/student-sessions-platform/SkillSwap/client/login.php">Login</a>

            <a href="/student-sessions-platform/SkillSwap/client/register.php">Sign Up</a>

        <?php endif; ?>

    </div>

</header>