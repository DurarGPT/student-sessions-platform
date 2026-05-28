<?php
include '../includes/db.php';
include '../includes/header.php';
?>

    <link rel="stylesheet" href="../assets/css/client_style.css">

<?php
/* رقم الطلب */
$requestId = $_GET['requestId'] ?? 1;

$message = "";

/* إضافة عمود الوقت إذا مو موجود */
try {
    $pdo->exec("
        ALTER TABLE sessions
        ADD session_time VARCHAR(20)
    ");
} catch (PDOException $e) {
    // العمود موجود مسبقًا
}

/* حفظ الموعد */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sessionDate = $_POST['session_date'];
    $sessionTime = $_POST['session_time'];

    $stmt = $pdo->prepare("
        INSERT INTO sessions
        (mentor_id, student_id, request_id, session_date, session_time, status)
        VALUES
        (3, 2, ?, ?, ?, 'scheduled')
    ");

    $stmt->execute([
            $requestId,
            $sessionDate,
            $sessionTime
    ]);

    $message = "Session scheduled successfully!";
}
?>

    <main class="schedule-page">

        <section class="schedule-hero">
            <h2>Schedule Session</h2>
            <p>Choose a suitable time for your mentoring session</p>

            <?php if($message != "") { ?>
                <div class="success-message">
                    <?php echo $message; ?>
                </div>
            <?php } ?>
        </section>

        <section class="schedule-card">
            <div class="schedule-header">
                <h3>Select Date & Time</h3>
                <p>May 10 - May 16, 2026</p>
            </div>

            <table class="schedule-table">
                <tr>
                    <th>Sun<br>10</th>
                    <th>Mon<br>11</th>
                    <th>Tue<br>12</th>
                    <th>Wed<br>13</th>
                    <th>Thu<br>14</th>
                    <th>Fri<br>15</th>
                    <th>Sat<br>16</th>
                </tr>

                <?php
                $dates = [
                        "2026-05-10",
                        "2026-05-11",
                        "2026-05-12",
                        "2026-05-13",
                        "2026-05-14",
                        "2026-05-15",
                        "2026-05-16"
                ];

                $times = [
                        "09:00 AM",
                        "10:00 AM",
                        "11:00 AM",
                        "12:00 PM",
                        "01:00 PM",
                        "02:00 PM",
                        "03:00 PM",
                        "04:00 PM",
                        "05:00 PM",
                        "06:00 PM",
                        "07:00 PM",
                        "08:00 PM"
                ];

                foreach($times as $time) {
                    echo "<tr>";

                    foreach($dates as $date) {
                        echo "
                        <td>
                            <form method='POST'>
                                <input type='hidden' name='session_date' value='$date'>
                                <input type='hidden' name='session_time' value='$time'>

                                <button type='submit' class='time-slot-btn'>
                                    $time
                                </button>
                            </form>
                        </td>
                    ";
                    }

                    echo "</tr>";
                }
                ?>
            </table>
        </section>

        <section class="session-details-card">
            <h3>Session Details</h3>

            <div class="details-grid">
                <div>
                    <p>Skill</p>
                    <strong>Public Speaking</strong>
                </div>

                <div>
                    <p>Learner</p>
                    <strong>James Wilson</strong>
                </div>

                <div>
                    <p>Mentor</p>
                    <strong>Emma Johnson</strong>
                </div>

                <div>
                    <p>Type</p>
                    <strong>One-on-One</strong>
                </div>
            </div>
        </section>

        <section class="session-status-card">
            <h3>Session Status</h3>

            <?php
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

            <?php if($session) { ?>
                <div class="scheduled-session">
                    <p>
                        Scheduled on
                        <strong><?php echo $session['session_date']; ?></strong>
                    </p>

                    <p>
                        Time:
                        <strong><?php echo $session['session_time']; ?></strong>
                    </p>

                    <span class="session-badge">
                    <?php echo $session['status']; ?>
                </span>
                </div>
            <?php } else { ?>
                <p class="no-session">
                    No sessions scheduled yet
                </p>
            <?php } ?>
        </section>

    </main>

    <script src="../../assets/js/script.js"></script>

<?php include '../includes/footer.php'; ?>