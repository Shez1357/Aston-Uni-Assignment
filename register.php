<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Sign Up</title>
</head>
<body>
    <h1>Sign Up</h1>
    <form action="process_registration.php" method="POST">
        <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        </div>

        <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        </div>

        <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        </div>

        <div>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        </div>

        <button type="submit">Register</button>
    </form>
</body>
</html>