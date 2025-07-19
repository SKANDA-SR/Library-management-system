<?php
$conn = new mysqli("localhost", "root", "", "library_db");
$id = intval($_GET['id']);
$conn->query("DELETE FROM books WHERE id = $id");
$conn->close();
?>