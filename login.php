<?php
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mysqli =  require __DIR__ . '/config/db.php';
    $sql = sprintf("SELECT * FROM cvs  WHERE email = '%s'", $mysqli->real_escape_string($_POST['email']));
    $result = $mysqli->query($sql);

    $result = $result->fetch_assoc();

    var_dump($result);
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
    <form action="process_login.php" method="POST">
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