<?php

$host = "localhost";
$username = "root";
$password = "";

try {

    // ================= CONNECT TO MYSQL =================
    $pdo = new PDO(
        "mysql:host=$host",
        $username,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected to MySQL successfully <br><br>";



    // ================= CREATE DATABASE =================
    $pdo->exec("CREATE DATABASE IF NOT EXISTS skillswap");
    echo "Database created successfully <br><br>";



    // ================= CONNECT TO DATABASE =================
    $pdo = new PDO(
        "mysql:host=$host;dbname=skillswap",
        $username,
        $password
    );



    // ================= USERS TABLE =================
    // تعديل: إضافة عمود profile_image مع قيمة افتراضية default.png
    $pdo->exec("
    CREATE TABLE IF NOT EXISTS users (
        user_id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(100) NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        role VARCHAR(50) DEFAULT 'student',
        bio TEXT,
        skills TEXT,
        profile_image VARCHAR(255) DEFAULT 'default.png',
        volunteer_hours INT DEFAULT 0,
        email_notifications TINYINT DEFAULT 1,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
");

    echo "Users table created <br><br>";



    // ================= DEFAULT ADMIN =================
    $adminEmail = "admin@skillswap.com";

    $checkAdmin = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $checkAdmin->execute([$adminEmail]);

    if ($checkAdmin->rowCount() == 0) {

        $stmt = $pdo->prepare("
            INSERT INTO users (full_name, email, password, role)
            VALUES (?, ?, ?, 'admin')
        ");

        $stmt->execute([
            "Admin",
            $adminEmail,
            password_hash("admin123", PASSWORD_DEFAULT)
        ]);

        echo "Admin created <br><br>";
    }



    // ================= REQUESTS TABLE =================
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS requests (
            request_id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT,
            title VARCHAR(255),
            description TEXT,
            category VARCHAR(100),
            level VARCHAR(50),
            status VARCHAR(50) DEFAULT 'open',
            preferred_date DATE,
            preferred_time VARCHAR(100),
            session_type VARCHAR(50),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(user_id)
        )
    ");

    echo "Requests table created <br><br>";



    // ================= MESSAGES TABLE =================
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS messages (
            message_id INT AUTO_INCREMENT PRIMARY KEY,
            sender_id INT,
            receiver_id INT,
            message_text TEXT,
            sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (sender_id) REFERENCES users(user_id),
            FOREIGN KEY (receiver_id) REFERENCES users(user_id)
        )
    ");

    echo "Messages table created <br><br>";



    // ================= SESSIONS TABLE =================
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS sessions (
            session_id INT AUTO_INCREMENT PRIMARY KEY,
            mentor_id INT,
            student_id INT,
            request_id INT,
            session_date DATE,
            status VARCHAR(50) DEFAULT 'pending',
            FOREIGN KEY (mentor_id) REFERENCES users(user_id),
            FOREIGN KEY (student_id) REFERENCES users(user_id),
            FOREIGN KEY (request_id) REFERENCES requests(request_id)
        )
    ");

    echo "Sessions table created <br><br>";



    // ================= VOLUNTEER HOURS =================
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS volunteer_hours (
            hour_id INT AUTO_INCREMENT PRIMARY KEY,
            mentor_id INT,
            hours_completed INT,
            approved VARCHAR(50) DEFAULT 'pending',
            submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (mentor_id) REFERENCES users(user_id)
        )
    ");

    echo "Volunteer hours table created <br><br>";



    // ================= CONTACT MESSAGES =================
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS contact_messages (
            contact_id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100),
            email VARCHAR(100),
            message TEXT,
            sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");

    echo "Contact messages table created <br><br>";



    echo "<h2>SkillSwap setup completed successfully </h2>";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
