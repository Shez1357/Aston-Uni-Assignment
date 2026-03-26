<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style.css">
    <title>Aston Uni CV website</title>
</head>
<body>
<style>
    body {
    text-align: center;
    margin: 0 auto;
    table {
        margin: 0 auto;
    }
}
</style>
<?php
    session_start();
    require 'config/db.php';
    echo "Connected successfully!";
    $stmt = $pdo->query("SELECT COUNT(*) FROM cvs");
    echo " Found " . $stmt->fetchColumn() . " CVs.";
    
    if (!empty($_SESSION['logged_in'])): ?>
        <p id="login-success" style="color: green;">Login successful!</p>
        <script>
            console.log('Timer script loaded');
            setTimeout(function() {
                console.log('Hiding message');
                document.getElementById('login-success').style.display = 'none';
            }, 5000);
        </script>
    <?php endif; ?>
    
    <h1>Aston University CV Website</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </nav>
    <form method="GET" action="search.php">
    <input type="text" name="q" placeholder="Search by name or language...">
    <button type="submit">Search</button>
    </form>
    <?php
    $stmt_names = $pdo->query("SELECT id ,name, email, keyprogramming FROM cvs");
    $cvs = $stmt_names->fetchAll(PDO::FETCH_ASSOC);
    if ($cvs) {

        echo "<table>";
        echo "<tr><th>Name</th><th>Email</th><th>Key Programming Languages</th></tr>";
        foreach ($cvs as $cv) {
            echo "<tr>"

               . "<td>" . "<a href='view_cv.php?id=" . $cv['id'] . "'>" 
               . htmlspecialchars($cv['name']) . "</a>" . "</td>"

               . "<td>" . htmlspecialchars($cv['email']) . "</td>"

               . "<td>" . htmlspecialchars($cv['keyprogramming']) . "</td>"

               . "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No CVs found.</p>";
    }
    ?>
</body>
</html>