
<?php
session_start();
include '../includes/db.php';

$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message)
    VALUES (?, ?, ?, ?)");

    $stmt->execute([$name, $email, $subject, $message]);

    $successMessage = "Message sent successfully!";
}
?>


<!DOCTYPE html>

<!--==================== RIMASSS ALMUNTI Contact page ====================-->
<html lang="en">

<head>
    <title>Contact</title>
    <link rel="stylesheet" href="../assets/css/client_style.css">
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

                <div class="contact-icon email-icon">
                    📧
                </div>

                <div>
                    <h2>Email</h2>
                    <p>support@skillswap.edu</p>
                    <p>info@skillswap.edu</p>
                </div>

            </div>

            <!--phone card-->
            <div class="contact-card">

                <div class="contact-icon phone-icon">
                    ☎️
                </div>

                <div>
                    <h2>Phone</h2>
                    <p>(555) 123-4567</p>
                    <p>Mon-Fri 9am-5pm</p>
                </div>

            </div>



            <!--office card-->
            <div class="contact-card">

                <div class="contact-icon office-icon">
                    📌
                </div>

                <div>
                    <h2>Office</h2>
                    <p>University Campus</p>
                    <p>Student Center, Building A</p>
                    <p>Room 203</p>
                </div>

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
            <?php if ($successMessage != ""): ?>
                <p style="color: green; font-weight: bold;">
                    <?php echo $successMessage; ?>
                </p>
            <?php endif; ?>

            <form method="POST" action="contact.php">

                <label for="name">Name *</label>
                <input type="text" id="name" name="name" placeholder="Your name">

                <label for="email">Email *</label>
                <input type="email" id="email" name="email" placeholder="your.email@university.edu">

                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" placeholder="What's this about?">

                <label for="message">Message *</label>
                <textarea id="message" name="message" rows="5" placeholder="Tell us more..."></textarea>

                <button type="submit">Send Message</button>

            </form>
        </section>

    </main>

    <!--help section-->
<section class="help-section">
    <h2>Need Immediate Help?</h2>

    <p>
        Check out our FAQ section or browse our Help Center for quick answers to common questions.
    </p>

    <a href="how-it-works.php" class="help-btn">
        Help Center & FAQ
    </a>
</section>

    <hr>
<?php include '../includes/footer.php'; ?>
<script src="../assets/js/script.js"></script>
</body>

</html>