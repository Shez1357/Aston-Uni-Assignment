<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$pdo = require __DIR__ . '/config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "UPDATE cvs SET keyprogramming = :keyprogramming, profile = :profile, education = :education, URLlinks = :URLlinks WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':keyprogramming' => $_POST['keyprogramming'],
        ':profile' => $_POST['profile'],
        ':education' => $_POST['education'],
        ':URLlinks' => $_POST['URLlinks'],
        ':id' => $user_id,
    ]);
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM cvs WHERE id = ?');
$stmt->execute([$user_id]);
$cv = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$cv) {
    die('CV not found.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Edit CV</title>
</head>
<body>
    <h1>Edit Your CV</h1>
    <?php include 'includes/nav.php'; ?>
    <form method="POST">
        <label>Key Programming:</label>
        <textarea name="keyprogramming"><?php echo htmlspecialchars($cv['keyprogramming']); ?></textarea><br>
        <label>Profile:</label>
        <textarea name="profile"><?php echo htmlspecialchars($cv['profile']); ?></textarea><br>
        <label>Education:</label>
        <textarea name="education"><?php echo htmlspecialchars($cv['education']); ?></textarea><br>
        <label>URL Links:</label>
        <input type="text" name="URLlinks" value="<?php echo htmlspecialchars($cv['URLlinks']); ?>"><br>
        <button type="submit">Update CV</button>
    </form>
</body>
</html>