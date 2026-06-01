<?php
global $pdo;
session_start();

include '../includes/db.php';
include '../includes/header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$currentUserId = $_SESSION['user_id'];

$requestId = $_GET['requestId']
        ?? $_GET['request_id']
        ?? null;

$sessionId = $_GET['sessionId']
        ?? $_GET['session_id']
        ?? null;


/* ================= GET CHAT DATA ================= */

if ($requestId) {

    $stmt = $pdo->prepare("
        SELECT
            requests.*,
            sessions.session_id,
            sessions.mentor_id,
            sessions.student_id,
            sessions.session_date,
            sessions.status AS session_status,
            mentor.full_name AS mentor_name,
            student.full_name AS student_name
        FROM requests
        LEFT JOIN sessions
            ON sessions.request_id = requests.request_id
        LEFT JOIN users AS mentor
            ON sessions.mentor_id = mentor.user_id
        LEFT JOIN users AS student
            ON sessions.student_id = student.user_id
        WHERE requests.request_id = ?
        ORDER BY sessions.session_id DESC
        LIMIT 1
    ");

    $stmt->execute([$requestId]);

} elseif ($sessionId) {

    $stmt = $pdo->prepare("
        SELECT
            requests.*,
            sessions.session_id,
            sessions.mentor_id,
            sessions.student_id,
            sessions.session_date,
            sessions.status AS session_status,
            mentor.full_name AS mentor_name,
            student.full_name AS student_name
        FROM sessions
        JOIN requests
            ON sessions.request_id = requests.request_id
        LEFT JOIN users AS mentor
            ON sessions.mentor_id = mentor.user_id
        LEFT JOIN users AS student
            ON sessions.student_id = student.user_id
        WHERE sessions.session_id = ?
        LIMIT 1
    ");

    $stmt->execute([$sessionId]);

} else {

    $stmt = $pdo->prepare("
        SELECT
            requests.*,
            sessions.session_id,
            sessions.mentor_id,
            sessions.student_id,
            sessions.session_date,
            sessions.status AS session_status,
            mentor.full_name AS mentor_name,
            student.full_name AS student_name
        FROM sessions
        JOIN requests
            ON sessions.request_id = requests.request_id
        LEFT JOIN users AS mentor
            ON sessions.mentor_id = mentor.user_id
        LEFT JOIN users AS student
            ON sessions.student_id = student.user_id
        WHERE sessions.mentor_id = ? OR sessions.student_id = ?
        ORDER BY sessions.session_id DESC
        LIMIT 1
    ");

    $stmt->execute([$currentUserId, $currentUserId]);
}

$chatData = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$chatData) {
    echo "
        <link rel='stylesheet' href='../assets/css/client_style.css'>

        <main class='chat-page'>
            <section class='chat-main-card' style='padding:30px;'>
                <h2>No chat found</h2>
                <p>You do not have an active chat yet.</p>
                <a href='Dashboard.php' class='schedule-btn' style='max-width:220px; margin-top:20px;'>
                    Back to Dashboard
                </a>
            </section>
        </main>
    ";

    include '../includes/footer.php';
    exit;
}

if (empty($requestId)) {
    $requestId = $chatData['request_id'];
}

$mentorId = $chatData['mentor_id'] ?? null;
$studentId = $chatData['student_id'] ?? null;


/* ================= FIND OTHER USER ================= */

if ($currentUserId == $mentorId) {
    $otherUserId = $studentId;
    $otherUserName = $chatData['student_name'];
} elseif ($currentUserId == $studentId) {
    $otherUserId = $mentorId;
    $otherUserName = $chatData['mentor_name'];
} else {
    $otherUserId = $studentId ?: $mentorId;
    $otherUserName = $chatData['student_name'] ?: $chatData['mentor_name'];
}

if (empty($otherUserName)) {
    $otherUserName = "Student";
}

$initials = strtoupper(substr($otherUserName, 0, 1));


/* ================= SAVE MESSAGE ================= */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $messageText = trim($_POST['message_text']);

    if (!empty($messageText) && !empty($otherUserId)) {

        $stmt = $pdo->prepare("
            INSERT INTO messages
            (sender_id, receiver_id, message_text)
            VALUES (?, ?, ?)
        ");

        $stmt->execute([
                $currentUserId,
                $otherUserId,
                $messageText
        ]);

        header("Location: chat.php?requestId=" . $requestId);
        exit;
    }
}


/* ================= GET MESSAGES ================= */

$messages = [];

if (!empty($otherUserId)) {

    $stmt = $pdo->prepare("
        SELECT *
        FROM messages
        WHERE
            (sender_id = ? AND receiver_id = ?)
            OR
            (sender_id = ? AND receiver_id = ?)
        ORDER BY message_id ASC
    ");

    $stmt->execute([
            $currentUserId,
            $otherUserId,
            $otherUserId,
            $currentUserId
    ]);

    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

    <link rel="stylesheet" href="../assets/css/client_style.css">

    <main class="chat-page">

        <section class="chat-layout">

            <div class="chat-left">

                <section class="chat-hero">
                    <h2>Chat</h2>
                    <p>Communicate with your learner</p>
                </section>

                <section class="chat-main-card">

                    <div class="chat-info-card">

                        <div class="chat-user">

                            <div class="chat-avatar">
                                <?php echo htmlspecialchars($initials); ?>
                            </div>

                            <div>
                                <h3><?php echo htmlspecialchars($otherUserName); ?></h3>
                                <p><?php echo htmlspecialchars($chatData['title']); ?> Session</p>
                            </div>

                        </div>

                        <span class="chat-status">
                        Active
                    </span>

                    </div>

                    <div class="messages-card">

                        <?php if (count($messages) > 0): ?>

                            <?php foreach ($messages as $msg): ?>

                                <div class="message-box <?php echo ($msg['sender_id'] == $currentUserId) ? 'my-message' : 'their-message'; ?>">
                                    <?php echo htmlspecialchars($msg['message_text']); ?>
                                </div>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <div class="empty-message">
                                <i class="fa-regular fa-user"></i>
                                <h3>No messages yet</h3>
                                <p>Start the conversation!</p>
                            </div>

                        <?php endif; ?>

                    </div>

                    <div class="send-message-card">

                        <form method="POST" class="message-form">

                            <input
                                    class="message-input"
                                    type="text"
                                    name="message_text"
                                    placeholder="Type your message..."
                                    required
                            >

                            <button class="send-icon-button" type="submit">
                                <i class="fa-solid fa-paper-plane"></i>
                            </button>

                        </form>

                    </div>

                </section>

            </div>

            <aside class="chat-sidebar">

                <section class="chat-side-card">

                    <h3>Session Info</h3>

                    <div class="side-info-item">
                        <span>Skill</span>
                        <strong><?php echo htmlspecialchars($chatData['title']); ?></strong>
                    </div>

                    <div class="side-info-item">
                        <span>Type</span>
                        <strong class="mini-badge">
                            <?php echo htmlspecialchars($chatData['session_type'] ?: 'one-on-one'); ?>
                        </strong>
                    </div>

                    <div class="side-info-item">
                        <span>Status</span>
                        <strong class="accepted-badge">
                            <?php echo htmlspecialchars($chatData['session_status'] ?: $chatData['status']); ?>
                        </strong>
                    </div>

                </section>

                <section class="chat-side-card scheduling-card">

                    <h3>
                        <i class="fa-regular fa-calendar"></i>
                        Scheduling
                    </h3>

                    <?php if (!empty($chatData['session_date'])): ?>

                        <div class="calendar-empty-icon">
                            <i class="fa-regular fa-calendar-check"></i>
                        </div>

                        <p>Session scheduled</p>

                    <?php else: ?>

                        <div class="calendar-empty-icon">
                            <i class="fa-regular fa-calendar"></i>
                        </div>

                        <p>No session scheduled</p>

                    <?php endif; ?>

                    <a href="schedule.php?requestId=<?php echo htmlspecialchars($requestId); ?>" class="schedule-btn">
                        <i class="fa-regular fa-calendar-plus"></i>
                        Schedule Session
                    </a>

                </section>

                <section class="chat-side-card quick-calendar-card">

                    <h3>Quick Calendar</h3>

                    <div class="quick-calendar-box">

                        <strong>
                            <?php echo !empty($chatData['session_date']) ? date('d', strtotime($chatData['session_date'])) : date('d'); ?>
                        </strong>

                        <span>
                        <?php echo !empty($chatData['session_date']) ? date('F Y', strtotime($chatData['session_date'])) : date('F Y'); ?>
                    </span>

                    </div>

                    <a href="schedule.php?requestId=<?php echo htmlspecialchars($requestId); ?>" class="view-schedule-btn">
                        View Full Schedule
                    </a>

                </section>

                <section class="chat-tips-card">

                    <h3>Tips for Great Sessions</h3>

                    <ul>
                        <li>Be respectful and professional</li>
                        <li>Prepare questions in advance</li>
                        <li>Test your setup before sessions</li>
                        <li>Share resources via chat</li>
                    </ul>

                </section>

            </aside>

        </section>

    </main>

    <script src="../assets/js/script.js"></script>

<?php include '../includes/footer.php'; ?>