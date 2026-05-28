<?php
include '../includes/db.php';
include '../includes/header.php';
?>

    <link rel="stylesheet" href="../assets/css/client_style.css">

<?php

$message = "";

/* حفظ الرسالة */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $messageText = $_POST['message_text'];

    if(!empty($messageText)) {

        $stmt = $pdo->prepare("

            INSERT INTO messages
            (sender_id, receiver_id, message_text)

            VALUES
            (2, 3, ?)

        ");

        $stmt->execute([$messageText]);

        $message = "Message sent successfully!";

    }

}
?>

    <main class="chat-page">

        <!-- عنوان المحادثة -->

        <section class="chat-hero">

            <h2>Chat Session</h2>

            <p>
                Communicate with your learner in real time
            </p>

        </section>

        <!-- معلومات الجلسة -->

        <section class="chat-info-card">

            <div class="chat-user">

                <div class="chat-avatar">
                    JW
                </div>

                <div>

                    <h3>James Wilson</h3>

                    <p>Public Speaking Session</p>

                </div>

            </div>

            <span class="chat-status">
            Active
        </span>

        </section>

        <!-- الرسائل -->

        <section class="messages-card">

            <h3>Messages</h3>

            <?php

            $stmt = $pdo->query("

            SELECT *

            FROM messages

            ORDER BY message_id DESC

        ");

            $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

            ?>

            <?php if(count($messages) > 0) { ?>

                <?php foreach($messages as $msg) { ?>

                    <div class="message-box">

                        <?php echo $msg['message_text']; ?>

                    </div>

                <?php } ?>

            <?php } else { ?>

                <p class="empty-message">

                    No messages yet

                </p>

            <?php } ?>

        </section>

        <!-- كتابة الرسالة -->

        <section class="send-message-card">

            <?php if($message != "") { ?>

                <div class="success-message">

                    <?php echo $message; ?>

                </div>

            <?php } ?>

            <form method="POST" class="message-form">

                <input
                        class="message-input"
                        type="text"
                        name="message_text"
                        placeholder="Type your message..."
                >

                <button
                        class="blue-button"
                        type="submit"
                >

                    Send

                </button>

            </form>

        </section>

        <!-- تفاصيل الجلسة -->

        <section class="session-info-card">

            <h3>Session Info</h3>

            <div class="session-grid">

                <div>
                    <p>Skill</p>
                    <strong>Public Speaking</strong>
                </div>

                <div>
                    <p>Type</p>
                    <strong>One-on-One</strong>
                </div>

                <div>
                    <p>Status</p>
                    <strong>Accepted</strong>
                </div>

            </div>

        </section>

        <!-- الانتقال للجدولة -->

        <section class="schedule-link-card">

            <h3>Scheduling</h3>

            <p>
                Choose a session time with your learner
            </p>

            <a href="schedule.php" class="schedule-btn">

                Schedule Session

            </a>

        </section>

    </main>

    <script src="../../assets/js/script.js"></script>

<?php include '../includes/footer.php'; ?>