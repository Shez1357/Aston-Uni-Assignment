<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    die("User ID not found. Please register again.");
}

$user_id = $_SESSION['user_id'];
$pdo = require __DIR__ . '/config/db.php';

try {
    $sql = "UPDATE cvs SET keyprogramming = :keyprogramming, education = :education, profile = :profile, URLlinks = :URLlinks WHERE id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':keyprogramming' => $_POST['skills'],
        ':education' => $_POST['education'],
        ':profile' => $_POST['profile'],
        ':URLlinks' => $_POST['social_links'],
        ':user_id' => $user_id,
    ]);
    
    unset($_SESSION['user_id']);
    header("Location: index.php");
    exit;
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>