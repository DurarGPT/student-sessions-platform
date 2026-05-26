<?php include '../includes/db.php'; ?>
<?php include '../includes/header.php'; ?>

    <main>

        <!-- قسم الجدولة -->
        <section class="chat-card">
            <h2>Schedule Session</h2>
            <p>Coordinate a time for your Public Speaking session</p>
        </section>

        <!-- اختيار التاريخ والوقت -->
        <section class="chat-card">
            <h3>Select Date & Time</h3>

            <p>May 10 - May 16, 2026</p>

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

                <tr>
                    <td>09:00 AM</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>10:00 AM</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>11:00 AM</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>12:00 PM</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>01:00 PM</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>02:00 PM</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>03:00 PM</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>04:00 PM</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>05:00 PM</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>06:00 PM</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>07:00 PM</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>08:00 PM</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </section>

        <!-- تفاصيل الجلسة -->
        <section class="chat-card">
            <h3>Session Details</h3>

            <p>Skill</p>
            <p><strong>Public Speaking</strong></p>

            <p>Learner</p>
            <p><strong>James Wilson</strong></p>

            <p>Mentor</p>
            <p><strong>Emma Johnson</strong></p>

            <p>Session Type</p>
            <p>one-on-one</p>
        </section>

        <!-- حالة الجلسة -->
        <section class="chat-card">
            <h3>Session Status</h3>

            <p>No sessions scheduled yet</p>
            <button class="blue-button" onclick="scheduleSession()">
                Schedule Session
            </button>
        </section>

    </main>
    <script src="../../assets/js/script.js"></script>
<?php include '../includes/footer.php'; ?>