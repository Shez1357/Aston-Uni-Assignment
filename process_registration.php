<?php
//Just in case if client side validation was bypassed somehow. Black magic if they do bypass client side 
if (empty($_POST['name'])) {
    die("Username is required.");
}

if (empty($_POST['email'])) {
    die("Email is required.");
}

if (empty($_POST['password'])) {
    die("Password is required.");
}

if (empty($_POST['confirm_password'])) {
    die("Please confirm your password.");
}

if (strlen($_POST['password']) < 8) {
    die("Password must be at least 8 characters long.");
}

if (! preg_match("/[A-Z]/", $_POST['password'])) {
    die("Password must contain at least one uppercase letter.");
}

if ($_POST['password'] !== $_POST['confirm_password']) {
    die("Passwords do not match.");
}

$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
$pdo = require __DIR__ . '/config/db.php';

try {
    $sql = "INSERT INTO cvs (name, email, password) VALUES (:name, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':password' => $password_hash,
    ]);
    
    $user_id = $pdo->lastInsertId();
    session_start();
    $_SESSION['user_id'] = $user_id;

    header("Location: fill_cv.php");
    exit;
} catch (PDOException $e) {
    // Handle duplicate email or other DB error nicely
    if ($e->errorInfo[1] === 1062) {
        die("Email already exists.");
    }
    die("Database error: " . $e->getMessage());
}
?>