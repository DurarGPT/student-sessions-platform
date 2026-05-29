<?php
global $pdo;
session_start();

include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../client/login.php");
    exit;
}

$userId = $_SESSION['user_id'];

/* ================= UPDATE PASSWORD ================= */
if (!empty($_POST['password'])) {

    $newPass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("
        UPDATE users
        SET password = ?
        WHERE user_id = ?
    ");

    $stmt->execute([$newPass, $userId]);
}

/* ================= UPDATE PROFILE IMAGE ================= */
if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {

    $originalName = basename($_FILES['profile_image']['name']);
    $safeName = preg_replace('/[^A-Za-z0-9._-]/', '_', $originalName);
    $imageName = time() . "_" . $safeName;

    $imageTmp = $_FILES['profile_image']['tmp_name'];
    $uploadDir = __DIR__ . "/../uploads/profile/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $uploadPath = $uploadDir . $imageName;

    if (move_uploaded_file($imageTmp, $uploadPath)) {

        $stmt = $pdo->prepare("
            UPDATE users
            SET profile_image = ?
            WHERE user_id = ?
        ");

        $stmt->execute([$imageName, $userId]);
    }
}

header("Location: ../client/profile.php");
exit;
?>
