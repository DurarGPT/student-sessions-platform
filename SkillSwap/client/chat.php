<?php
include '../includes/db.php';
include '../includes/header.php';
?>

    <link rel="stylesheet" href="../assets/css/client_style.css">

<?php

$requestId = $_GET['requestId'] ?? 1;
$message = "";

/* حفظ الرسالة */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $messageText = trim($_POST['message_text']);

    if(!empty($messageText)) {

        $stmt = $pdo->prepare("
            INSERT INTO messages
            (sender_id, receiver_id, message_text)
            VALUES
            (?, ?, ?)
        ");

        $stmt->execute([
                1,
                1,
                $messageText
        ]);

        $message = "Message sent successfully!";
    }
}

/* جلب الرسائل */
$stmt = $pdo->prepare("
    SELECT *
    FROM messages
    ORDER BY message_id ASC
");

$stmt->execute();
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* جلب آخر موعد من الجدولة */
$stmt = $pdo->prepare("
    SELECT session_date, session_time, status
    FROM sessions
    WHERE request_id = ?
    ORDER BY session_id DESC
    LIMIT 1
");

$stmt->execute([$requestId]);
$session = $stmt->fetch(PDO::FETCH_ASSOC);

?>

    <main class="chat-page">

        <section class="chat-hero">
            <h2>Chat</h2>
            <p>Communicate with your learner</p>
        </section>

        <!-- صندوق المحادثة الكامل -->
        <section class="chat-main-card">

            <!-- رأس المحادثة -->
            <div class="chat-info-card">

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

            </div>

            <!-- الرسائل -->
            <div class="messages-card">

                <?php if(count($messages) > 0) { ?>

                    <?php foreach($messages as $msg) { ?>

                        <div class="message-box">
                            <?php echo htmlspecialchars($msg['message_text']); ?>
                        </div>

                    <?php } ?>

                <?php } else { ?>

                    <div class="empty-message">
                        <h3>No messages yet</h3>
                        <p>Start the conversation!</p>
                    </div>

                <?php } ?>

            </div>

            <!-- كتابة الرسالة -->
            <div class="send-message-card">

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
                            required
                    >

                    <button
                            class="blue-button"
                            type="submit"
                    >
                        Send
                    </button>

                </form>

            </div>

        </section>

        <!-- حالة الموعد بعد الجدولة -->
        <section class="session-info-card">

            <h3>Session Status</h3>

            <?php if($session) { ?>

                <div class="session-grid">

                    <div>
                        <p>Date</p>
                        <strong><?php echo htmlspecialchars($session['session_date']); ?></strong>
                    </div>

                    <div>
                        <p>Time</p>
                        <strong><?php echo htmlspecialchars($session['session_time']); ?></strong>
                    </div>

                    <div>
                        <p>Status</p>
                        <strong><?php echo htmlspecialchars($session['status']); ?></strong>
                    </div>

                </div>

            <?php } else { ?>

                <p class="no-session">
                    No sessions scheduled yet
                </p>

            <?php } ?>

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

            <a href="schedule.php?requestId=<?php echo $requestId; ?>" class="schedule-btn">
                Schedule Session
            </a>

        </section>

    </main>

    <script src="../assets/js/script.js"></script>

<?php include '../includes/footer.php'; ?>