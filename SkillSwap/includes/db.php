<?php
// Database connection file (db.php)

$host = "localhost";
$username = "root";
$password = "";
$dbname = "skillswap"; // same name used in setup.php

try {
    // Create PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
