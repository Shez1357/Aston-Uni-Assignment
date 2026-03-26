<?php
//Just in case if client side validation was bypassed somehow. Black magic if they do bypass client side 
if (empty($_POST['name'])) {
    echo "Username is required.<br><a href='register.php'>Go back to registration</a>";
    exit;
}

if (empty($_POST['email'])) {
    echo "Email is required.<br><a href='register.php'>Go back to registration</a>";
    exit;
}

if (empty($_POST['password'])) {
    echo "Password is required.<br><a href='register.php'>Go back to registration</a>";
    exit;
}

if (empty($_POST['confirm_password'])) {
    echo "Please confirm your password.<br><a href='register.php'>Go back to registration</a>";
    exit;
}

if (strlen($_POST['password']) < 8) {
    echo "Password must be at least 8 characters long.<br><a href='register.php'>Go back to registration</a>";
    exit;
}

if (! preg_match("/[A-Z]/", $_POST['password'])) {
    echo "Password must contain at least one uppercase letter.<br><a href='register.php'>Go back to registration</a>";
    exit;
}

if ($_POST['password'] !== $_POST['confirm_password']) {
    echo "Passwords do not match.<br><a href='register.php'>Go back to registration</a>";
    exit;
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
        echo "Email already exists.<br><a href='register.php'>Go back to registration</a>";
    } else {
        echo "Database error: " . $e->getMessage() . "<br><a href='register.php'>Go back to registration</a>";
    }
    exit;
}
?>