<?php
$host = "localhost";
$user = "root"; // XAMPP default
$pass = "";
$dbname = "webproject"; // এখানে user_db এর জায়গায় webproject

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
