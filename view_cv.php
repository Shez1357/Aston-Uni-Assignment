<?php
    session_start();
    require 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style.css">
    <title>View CV - Aston Uni CV website</title>
<body>
    <style>
    body {
    text-align: center;
    margin: 0 auto;
    table{
        margin: 0 auto;
    }


}
</style>
    <h1>CV Details</h1>
    <?php include 'includes/nav.php'; ?>
    <form method="GET" action="search.php">
        <input type="text" name="q" placeholder="Search by name or language..." value="<?php echo htmlspecialchars($searchTerm); ?>">
        <button type="submit">Search</button>
    </form>
    <?php
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
</body>
</html>
