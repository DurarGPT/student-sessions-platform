<!DOCTYPE html>

<!--==================== contact page -RIMASS ====================-->

<html lang="en">

<head>
    <title>Contact</title>
    <link rel="stylesheet" href="../../assets/css/client_style.css">
</head>

<body class="contact-page">

  
<header>
    <h1>SkillSwap</h1>

    <nav>
        <a href="index.html">Home</a>
        <a href="about.html">About</a>
        <a href="how-it-works.html">How It Works</a>
        <a href="browse-requests.html">Browse Requests</a>
        <a href="contact.html">Contact</a>
        <a href="login.html">Login</a>
        <a href="register.html">Sign Up</a>
    </nav>
</header>
    <hr>


<section class="contact-hero">
    <h1>Contact Us</h1>
    <p>Have questions? We're here to help. Reach out to our team.</p>
</section>
    <!--contact content layout-->
    <main class="contact-grid">

        <!--left side contact information-->
        <section>

            <!--email card-->
            <div class="contact-card">
                <h2>Email</h2>
                <p>support@skillswap.edu</p>
                <p>info@skillswap.edu</p>
            </div>

            <!--phone card-->
            <div class="contact-card">
                <h2>Phone</h2>
                <p>(555) 123-4567</p>
                <p>Mon-Fri 9am-5pm</p>
            </div>

            <!--office card-->
            <div class="contact-card">
                <h2>Office</h2>
                <p>University Campus</p>
                <p>Student Center, Building A</p>
                <p>Room 203</p>
            </div>

            <!--office hours section-->
            <section class="office-hours">
                <h2>Office Hours</h2>
                <p>Monday - Thursday: 9:00 AM - 6:00 PM</p>
                <p>Friday: 9:00 AM - 4:00 PM</p>
                <p>Saturday - Sunday: Closed</p>
            </section>

        </section>

        <!--right side message form-->
        <section class="contact-form">
            <h2>Send Us a Message</h2>

            <form>

                <label for="name">Name *</label><br>
                <input type="text" id="name" name="name" placeholder="Your name"><br><br>

                <label for="email">Email *</label><br>
                <input type="email" id="email" name="email" placeholder="your.email@university.edu"><br><br>

                <label for="subject">Subject</label><br>
                <input type="text" id="subject" name="subject" placeholder="What's this about?"><br><br>

                <label for="message">Message *</label><br>
                <textarea id="message" name="message" rows="5" placeholder="Tell us more..."></textarea><br><br>

                <button type="submit">Send Message</button>

            </form>
        </section>

    </main>

    <!--help section-->
    <section class="help-section">
        <h2>Need Immediate Help?</h2>
        <p>Check out our FAQ section or browse our Help Center for quick answers to common questions.</p>

        <button>Visit Help Center</button>
        <button>View FAQ</button>
    </section>

    <hr>



<footer>

    <div>
        <h3>SkillSwap</h3>
        <p>
            Learn. Teach. Earn. Empowering university students
            through peer mentoring.
        </p>
    </div>

    <div>
        <h3>Quick Links</h3>

        <a href="about.html">About</a><br>
        <a href="how-it-works.html">How It Works</a><br>
        <a href="browse-requests.html">Browse Requests</a><br>
        <a href="contact.html">Contact</a>
    </div>

    <div>
        <h3>For Students</h3>

        <a href="profile.html">Become a Mentor</a><br>
        <a href="post-request.php">Request Help</a><br>
        <a href="volunteer-hours.html">Track Hours</a><br>
        <a href="../admin/admin.php">Admin Panel</a>
    </div>

    <div>
        <h3>Contact</h3>

        <p>University Campus</p>
        <p>support@skillswap.edu</p>
    </div>

    <p>©️ 2026 SkillSwap</p>

</footer>
</body>

</html>