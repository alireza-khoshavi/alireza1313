<?php
session_start();

// Ensure the user is logged in
if (empty($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin.php"); // Redirect to login page if not logged in
    exit;
}

$conn = new mysqli("localhost", "root", "", "my_database");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM comments");

?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>مدیریت کامنت‌ها | پنل مدیریت</title>
    <style>
        body {
            background-color: #121212;
            color: #eee;
            font-family: 'Vazirmatn', sans-serif;
        }

        .container {
            margin: 50px auto;
            padding: 30px;
            background-color: #1e1e1e;
            border-radius: 12px;
            width: 80%;
            box-shadow: 0 4px 12px rgba(0,0,0,0.5);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: right;
            border: 1px solid #444;
        }

        th {
            background-color: #333;
        }

        tr:nth-child(even) {
            background-color: #222;
        }

        button {
            background-color: #f44336;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #d32f2f;
        }

        .edit-btn {
            background-color: #03a9f4;
        }

        .edit-btn:hover {
            background-color: #0288d1;
        }

        /* دکمه برگشت */
        .back-btn {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 8px;
            text-decoration: none;
            margin-top: 20px;
        }

        .back-btn:hover {
            background-color: #388e3c;
        }
    </style>
</head>
<body>

<main class="container">
    <h1>مدیریت کامنت‌ها</h1>
    <table>
        <thead>
            <tr>
                <th>نام</th>
                <th>کامنت</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($comment = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($comment['name']) ?></td>
                    <td><?= htmlspecialchars($comment['message']) ?></td>
                    <td>
                        <a href="edit_comment.php?id=<?= $comment['id'] ?>" class="edit-btn">ویرایش</a>
                        <form action="delete_comment.php" method="POST" style="display:inline-block;">
                            <input type="hidden" name="id" value="<?= $comment['id'] ?>">
                            <button type="submit">حذف</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- دکمه برگشت به صفحه مدیریت -->
    <a href="dashboard.php" class="back-btn">بازگشت به پنل مدیریت</a>
</main>

</body>
</html>
