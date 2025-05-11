<?php
include("hed.html");
$conn = new mysqli("localhost", "root", "", "my_database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ذخیره‌سازی کامنت
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!empty($name) && !empty($message)) {
        $stmt = $conn->prepare("INSERT INTO comments (name, message) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $message);
        $stmt->execute();
        $stmt->close();
    }
}

$result = $conn->query("SELECT * FROM comments ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comments</title>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
            margin: 0;
            background: url('images/fdsdfsad.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #eee;
        }

        .comment-container {
            background-color: rgba(18, 18, 18, 0.85);
            padding: 30px;
            max-width: 700px;
            margin: 50px auto;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        h2, h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        form input, form textarea {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            background-color: #333;
            color: #fff;
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #03a9f4;
            border: none;
            border-radius: 30px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0288d1;
        }

        .comment {
            background-color: #1e1e1e;
            padding: 15px;
            margin-top: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255,255,255,0.05);
        }

        .comment strong {
            color: #03a9f4;
        }

        .comment small {
            color: #aaa;
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="comment-container">
    <h2>Leave a Comment</h2>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Your Name" required>
        <textarea name="message" placeholder="Your Comment" required></textarea>
        <button type="submit">Submit</button>
    </form>

    <hr>

    <h3>All Comments:</h3>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="comment">
            <strong><?= $row['name'] ?>:</strong>
            <p><?= nl2br($row['message']) ?></p>
            <small><?= $row['created_at'] ?></small>
        </div>
    <?php endwhile; ?>
</div>

<?php include("foter.html"); ?>
</body>
</html>
