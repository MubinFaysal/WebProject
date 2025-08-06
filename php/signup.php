<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password_raw = $_POST['password'] ?? '';

    if (empty($username) || empty($email) || empty($password_raw)) {
        echo "❌ All fields are required!";
        exit();
    }

    $password = password_hash($password_raw, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    if (!$stmt) {
        echo "❌ Prepare failed: " . $conn->error;
        exit();
    }

    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        // রেজিস্ট্রেশন সফল → লগইন পেজে রিডাইরেক্ট
        header("Location: ../html/signup_signin.html");  // লগইন পেজ যেখানে আছে সেই ফাইলের relative path দাও
        exit();
    } else {
        echo "❌ Error: " . $stmt->error;
    }
} else {
    // সরাসরি ব্রাউজারে খুললে বা GET রিকোয়েস্টে
    echo "❌ Please submit the form from the Sign Up page.";
}
?>
