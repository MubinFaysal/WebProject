<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:../html/signup_signin.html");
    exit();
}
echo "Welcome, " . $_SESSION['username'] . "!";
?>
<br><a href="logout.php">Logout</a>
