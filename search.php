<!DOCTYPE html>
<?php
session_start();
require 'config/db.php';

$pageTitle = 'Search CVs - Aston Uni CV website';

$searchTerm = isset($_GET['q']) ? trim($_GET['q']) : '';

if ($searchTerm !== '') {
    $stmt = $pdo->prepare("SELECT id, name, email, keyprogramming FROM cvs WHERE name LIKE ? OR keyprogramming LIKE ?");
    $stmt->execute(["%$searchTerm%", "%$searchTerm%"]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "No search found.";
}
?>
<html lang="en">
<?php include 'includes/header.php'; ?>
<body>
    <h1>Search Results</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </nav>
    <form method="GET" action="search.php">
        <input type="text" name="q" placeholder="Search by name or language..." value="<?php echo htmlspecialchars($searchTerm); ?>">
        <button type="submit">Search</button>
    </form>
    <?php
    if (!empty($results)) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Email</th><th>Key Programming Languages</th></tr>";
        foreach ($results as $cv) {
            echo "<tr>"
               . "<td>" . "<a href='view_cv.php?id=" . $cv['id'] . "'>" 
               . htmlspecialchars($cv['name']) . "</a>" . "</td>"
               . "<td>" . htmlspecialchars($cv['email']) . "</td>"
               . "<td>" . htmlspecialchars($cv['keyprogramming']) . "</td>"
               . "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No CVs found matching your search.</p>";
    }
    ?>
</body>
</html>