<?php
// اتصال به دیتابیس
$conn = new mysqli("localhost", "root", "", "my_database");
if ($conn->connect_error) die("DB Error");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $message = htmlspecialchars(trim($_POST['message']));
    if ($name && $message) {
        $stmt = $conn->prepare("INSERT INTO comments (name, message) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $message);
        $stmt->execute();
    }
}
$result = $conn->query("SELECT * FROM comments ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Comments</title>
  <style>
    body {
      margin: 0;
      font-family: "Vazirmatn", sans-serif;
      background: url('images/bg.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #fff;
    }
    .overlay {
      background-color: rgba(0, 0, 0, 0.75);
      min-height: 100vh;
      padding: 50px 20px;
    }
    .comment-box, .comment-list {
      background: #1e1e1e;
      padding: 25px;
      border-radius: 12px;
      max-width: 600px;
      margin: 20px auto;
      box-shadow: 0 0 20px rgba(0,0,0,0.4);
    }
    input, textarea {
      width: 100%;
      padding: 12px;
      margin-top: 10px;
      margin-bottom: 20px;
      border-radius: 8px;
      border: none;
      background: #333;
      color: #fff;
    }
    button {
      background: #03a9f4;
      padding: 10px 25px;
      border: none;
      border-radius: 8px;
      color: #fff;
      cursor: pointer;
    }
    .comment {
      border-bottom: 1px solid #444;
      padding: 10px 0;
    }
    .comment:last-child {
      border: none;
    }
  </style>
</head>
<body>
<div class="overlay">
  <div class="comment-box">
    <h2>Leave a Comment</h2>
    <form method="post">
      <input type="text" name="name" placeholder="Your Name" required />
      <textarea name="message" rows="4" placeholder="Your Message" required></textarea>
      <button type="submit">Submit</button>
    </form>
  </div>

  <div class="comment-list">
    <h3>Recent Comments:</h3>
    <?php while($row = $result->fetch_assoc()): ?>
      <div class="comment">
        <strong><?= $row['name'] ?>:</strong>
        <p><?= nl2br($row['message']) ?></p>
      </div>
    <?php endwhile; ?>
  </div>
</div>
</body>
</html>
