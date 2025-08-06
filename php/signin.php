<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            // Registration successful → Redirect to login page
            header("Location: ../html/games.html"); // এখানে তোমার লগইন পেজের path দাও
            exit();
        } else {
            echo "❌ Error: " . $stmt->error;
        }
    } else {
        echo "❌ All fields are required!";
    }
} else {
    echo "❌ Please submit the form from the Sign Up page.";
}
?>
