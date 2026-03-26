<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: register.php");
    exit;
}   

$user = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>CV details</title>
</head>
<body>
    <h1>Fill in your CV details</h1>
    <form action="process_cv.php" method="POST">
        <div>
        <label for="skills">Key Programming Language:</label><br>
        <textarea id="skills" name="skills" rows="4" cols="50" required></textarea><br><br>
        </div>

        <div>
        <label for="education">Education:</label><br>
        <textarea id="education" name="education" rows="4" cols="50" required></textarea><br><br>
        </div>

        <div>
        <label for="profile">Profile:</label><br>
        <textarea id="profile" name="profile" rows="4" cols="50" required></textarea><br><br>
        </div>

        <div>
            <label for="social_links">Social Links (LinkedIn, GitHub, etc.):</label><br>
            <textarea id="social_links" name="social_links" rows="4" cols="50"></textarea><br><br>
        </div>
        <button type="submit">Submit CV</button>
    </form>
</body>
</html>