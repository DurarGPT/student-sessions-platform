<!DOCTYPE html>

<!--==================== contact page -RIMASS ====================-->

<html lang="en">

<head>
    <title>Contact</title>
    <link rel="stylesheet" href="../../assets/css/client_style.css">
</head>

<body class="contact-page">

<?php include '../includes/header.php'; ?>



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
<?php include '../includes/footer.php'; ?>
</body>

</html>