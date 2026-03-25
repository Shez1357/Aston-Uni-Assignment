<!DOCTYPE html>
    <?php
    session_start();
    require 'config/db.php';
    echo "Connected successfully!";
    $stmt = $pdo->query("SELECT COUNT(*) FROM cvs");
    echo " Found " . $stmt->fetchColumn() . " CVs.";
    
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style.css">
    <title>Aston Uni CV website</title>
</head>
<body>
    <h1>Aston University CV Website</h1>
    <nav>
        <a href="index.php">Home</a>
    </nav>

    <?php
        // Fetch and display CV names
    $stmt_names = $pdo->query("SELECT name, email, keyprogramming FROM cvs");
    $cvs = $stmt_names->fetchAll(PDO::FETCH_ASSOC);
    if ($cvs) {

        echo "<table>";
        echo "<tr><th>Name</th><th>Email</th><th>Key Programming Languages</th></tr>";
        foreach ($cvs as $cv) {
            echo "<tr>"
               . "<td>" . htmlspecialchars($cv['name']) . "</td>"
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