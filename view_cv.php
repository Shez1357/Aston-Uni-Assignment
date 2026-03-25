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
    echo "name: " . htmlspecialchars($cv['name']) . "<br>";
    echo "email: " . htmlspecialchars($cv['email']) . "<br>";
    echo "key programming languages: " . htmlspecialchars($cv['keyprogramming']) . "<br>";
    echo "profile:" . "<br>" . htmlspecialchars($cv['profile']) . "<br>";
    echo "education:" . "<br>" . htmlspecialchars($cv['education']) . "<br>";
    echo "Links:" . "<br>" . htmlspecialchars($cv['URLlinks']) . "<br>";