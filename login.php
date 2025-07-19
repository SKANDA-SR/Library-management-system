<?php
session_start();
$conn = new mysqli("127.0.0.1", "root", "", "library_db", 3307);
$username = $_POST['username'];
$password = $_POST['password'];
$stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows == 1) {
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();
    if (password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    }
}
echo "Invalid login credentials. <a href='auth.html'>Try again</a>";
?>