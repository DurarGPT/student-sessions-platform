<?php
global $pdo;
session_start();

// الاتصال بقاعدة البيانات //
include 'includes/db.php'; // ✅ تم تعديل المسار الصحيح

$userId = $_SESSION['user_id'];

// ================= تحديث الاسم ================= //
if (!empty($_POST['full_name'])) {
    $newName = $_POST['full_name'];
    $stmt = $pdo->prepare("UPDATE users SET full_name=? WHERE user_id=?");
    $stmt->execute([$newName, $userId]);
}

// ================= تحديث الباسورد ================= //
if (!empty($_POST['password'])) {
    $newPass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("UPDATE users SET password=? WHERE user_id=?");
    $stmt->execute([$newPass, $userId]);
}

// ================= تحديث الصورة ================= //
if (!empty($_FILES['profile_image']['name'])) {
    $imageName = time() . "_" . $_FILES['profile_image']['name'];
    $imageTmp = $_FILES['profile_image']['tmp_name'];
    $uploadPath = "uploads/profile/" . $imageName;

    move_uploaded_file($imageTmp, $uploadPath);

    $stmt = $pdo->prepare("UPDATE users SET profile_image=? WHERE user_id=?");
    $stmt->execute([$imageName, $userId]);
}

// Redirect back to profile page after update //
header("Location: profile.php");
exit;
?>
