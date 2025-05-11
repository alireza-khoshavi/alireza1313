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
    $name = htmlspecialchars(trim($_POST['name']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    $stmt = $conn->prepare("UPDATE comments SET name=?, message=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $message, $id);
    $stmt->execute();

    header("Location: manage_comments.php"); // Redirect to manage comments page after update
    exit;
}

if (!isset($_GET['id'])) {
    echo "Invalid ID.";
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM comments WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$comment = $result->fetch_assoc();

if (!$comment) {
    echo "Comment not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Comment</title>
  <style>
    body {
      background: #121212;
      color: #fff;
      font-family: "Vazirmatn", sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .form-box {
      background: #1e1e1e;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.4);
      width: 400px;
    }
    h2 {
      margin-bottom: 20px;
      color: #03a9f4;
    }
    input, textarea {
      width: 100%;
      padding: 10px;
      background: #2a2a2a;
      border: none;
      border-radius: 8px;
      color: #fff;
      margin-bottom: 15px;
    }
    button {
      background: #03a9f4;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      cursor: pointer;
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="form-box">
    <h2>Edit Comment</h2>
    <form method="post">
      <input type="hidden" name="id" value="<?= $comment['id'] ?>">
      <input type="text" name="name" value="<?= htmlspecialchars($comment['name']) ?>" required>
      <textarea name="message" rows="4" required><?= htmlspecialchars($comment['message']) ?></textarea>
      <button type="submit">Save Changes</button>
    </form>
  </div>
</body>
</html>
