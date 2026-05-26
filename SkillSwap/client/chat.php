<?php include '../includes/db.php'; ?>
<?php include '../includes/header.php'; ?>

    <main>

        <!-- قسم المحادثة -->
        <section class="chat-card">

            <h2>Chat</h2>

            <p>Communicate with your learner</p>

        </section>

        <!-- معلومات الجلسة -->
        <section class="chat-card">

            <h3>James Wilson</h3>

            <p>Public Speaking Session</p>

            <p>Active</p>

        </section>

        <!-- الرسائل -->
        <section class="chat-card">

            <h3>No messages yet</h3>

            <p>Start the conversation!</p>

        </section>

        <!-- كتابة الرسالة -->
        <section class="chat-card">

            <input class="message-input"
                   type="text"
                   placeholder="Type your message...">

            <button class="blue-button">
                Send
            </button>

        </section>

        <!-- معلومات الجلسة -->
        <section class="chat-card">

            <h3>Session Info</h3>

            <p>Skill: Public Speaking</p>

            <p>Type: one-on-one</p>

            <p>Status: Accepted</p>

        </section>

        <!-- الجدولة -->
        <section class="chat-card">

            <h3>Scheduling</h3>

            <p>No session scheduled</p>

            <button class="blue-button">
                Schedule Session
            </button>

        </section>

    </main>

<?php include '../includes/footer.php'; ?>