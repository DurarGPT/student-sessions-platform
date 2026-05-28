<link
        rel="stylesheet"
        href="/student-sessions-platform/SkillSwap/assets/css/client_style.css"
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

            <img src="../assets/images/skillswap-logo.png"
                 alt="SkillSwap Logo"
                 class="header-logo-img">

            SkillSwap

        </h1>

        <!-- NAVIGATION -->
        <nav>

            <a href="index.php">Home</a>

            <a href="about.php">About</a>

            <a href="how-it-works.php">How It Works</a>

            <a href="browse-requests.php">Browse Requests</a>

            <a href="contact.php">Contact</a>

        </nav>

    </div>


    <div class="header-right">

        <?php if(isset($_SESSION['user_id'])): ?>

            <a href="inbox.php" class="notification-link">
                <i class="fa-regular fa-bell"></i>
            </a>

            <a href="profile.php">Profile</a>

            <a href="Dashboard.php">Dashboard</a>

            <a href="post-request.php">Post Request</a>

            <a href="logout.php">Logout</a>

        <?php else: ?>

            <a href="login.php">Login</a>

            <a href="register.php">Sign Up</a>

        <?php endif; ?>

    </div>
    </div>

</header>
