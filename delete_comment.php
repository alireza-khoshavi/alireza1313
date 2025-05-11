<?php
session_start();

if (empty($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin.php"); // Redirect to login page if not logged in
    exit;
}

$conn = new mysqli("localhost", "root", "", "my_database");
if ($conn->connect_error) die("Connection failed");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];

    // جلوگیری از SQL Injection
    $stmt = $conn->prepare("DELETE FROM comments WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: manage_comments.php"); // Redirect back to manage comments page
exit;
?>
