<?php
session_start();
?>
    <nav>
        <a href="index.php">Home</a>
        <?php if (!empty($_SESSION['logged_in'])): ?>
            <a href="edit_cv.php">Edit CV</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php endif; ?>
    </nav>