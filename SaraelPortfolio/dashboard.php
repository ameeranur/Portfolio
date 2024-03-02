<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php"); // Redirect to login page if not logged in
    exit();
}

echo "Welcome, " . $_SESSION["username"] . "!";
?>

<a href="logout.php">Logout</a>
