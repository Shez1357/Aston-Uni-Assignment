<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valid = false;
    $pdo = require __DIR__ . '/config/db.php';

    $stmt = $pdo->prepare("SELECT * FROM cvs WHERE email = ?");
    $stmt->execute([$_POST['email']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['logged_in'] = true;
        header('Location: index.php');
        exit;
    } else {
        $error = "Login failed. Check email/password.";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>  

    
    <form method="POST">
        <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        </div>

        <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        </div>

        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a>.</p>
</body>
</html>