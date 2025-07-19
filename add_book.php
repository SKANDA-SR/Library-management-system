<?php
header('Content-Type: application/json');

$conn = new mysqli("127.0.0.1", "root", "", "library_db", 3307);

if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed"]);
    exit();
}

if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['published_year'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = intval($_POST['published_year']);

    $stmt = $conn->prepare("INSERT INTO books (title, author, published_year) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $title, $author, $year);

    if ($stmt->execute()) {
        echo json_encode([
            "title" => $title,
            "author" => $author,
            "published_year" => $year
        ]);
    } else {
        echo json_encode(["error" => "Insert failed"]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Missing data"]);
}

$conn->close();
?>
