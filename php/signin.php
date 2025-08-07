<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "<script>alert('❌ All fields are required!'); window.location.href = '../html/signup_signin.html';</script>";
        exit();
    }

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            // ✅ Redirect to game page
            header("Location: ../html/games.html");
            exit();
        } else {
            echo "<script>alert('❌ Incorrect password!'); window.location.href = '../html/signup_signin.html';</script>";
            exit();
        }
    } else {
        echo "<script>alert('❌ User not found!'); window.location.href = '../html/signup_signin.html';</script>";
        exit();
    }
}
?>
