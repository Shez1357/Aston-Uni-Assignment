<?php 
    $host = 'localhost';
    $dbname = 'astoncv';
    $user = 'root';
    $pass = '';

    $mysqli = new mysqli(hostname: $host, username: $user, password: $pass, database: $dbname);
    if ($mysqli->connect_errno) {
        die("Failed to connect to MySQL: " . $mysqli->connect_error);
    }
    try{
        $pdo = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
            $user,
            $pass
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Could not connect to the database $dbname :" . $e->getMessage());
    }

    // return the PDO instance for use in app code
    return $pdo;
?>