<?php
    session_start();
    require 'config/db.php';
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if (!$id){
        die("Invalid CV ID.");
    }

    $stmt = $pdo->prepare("SELECT * FROM cvs WHERE id = ?");
    $stmt->execute([$id]);
    $cv = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cv) {
        die("CV not found.");
    }
    echo "<table border='1'>";
    echo "<tr><th>Topic</th><th>Data</th></tr>";
    echo "<tr><td>Name</td><td>" . htmlspecialchars($cv['name']) . "</td></tr>";
    echo "<tr><td>Email</td><td>" . htmlspecialchars($cv['email']) . "</td></tr>";
    echo "<tr><td>Key Programming Languages</td><td>" . htmlspecialchars($cv['keyprogramming']) . "</td></tr>";
    echo "<tr><td>Profile</td><td>" . nl2br(htmlspecialchars($cv['profile'])) . "</td></tr>";
    echo "<tr><td>Education</td><td>" . nl2br(htmlspecialchars($cv['education'])) . "</td></tr>";
    echo "<tr><td>Links</td><td>" . nl2br(htmlspecialchars($cv['URLlinks'])) . "</td></tr>";
    echo "</table>";

?>