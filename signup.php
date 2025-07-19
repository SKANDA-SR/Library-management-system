<?php
session_start();

$conn = new mysqli("127.0.0.1", "root", "", "library_db", 3307);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if username and password are set
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "Signup successful. <a href='auth.html'>Login here</a>";
    } else {
        echo "Signup failed. Possibly, username already exists.";
    }
} else {
    echo "Username and password are required.";
}
?>
