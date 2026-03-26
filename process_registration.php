<?php
//Just in case if client side validation was bypassed somehow.
if (empty($_POST['username'])) {
    die("Username is required.");
}

if (empty($_POST['email'])) {
    die("Email is required.");
}

if (empty($_POST['password'])) {
    die("Password is required.");
}

if (empty($_POST['confirm_password'])) {
    die("Please confirm your password.");
}

if (strlen($_POST['password']) < 8) {
    die("Password must be at least 8 characters long.");
}

if (! preg_match("/[A-Z]/", $_POST['password'])) {
    die("Password must contain at least one uppercase letter.");
}

if ($_POST['password'] !== $_POST['confirm_password']) {
    die("Passwords do not match.");
}

$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
print_r($_POST);
print_r($password_hash);
?>