<?php
session_start();

if (empty($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin.php"); // Redirect to login page if not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>پنل مدیریت | سایت من</title>
    <link rel="stylesheet" href="index.css">
    <style>
        body {
            background-color: #121212;
            font-family: 'Vazirmatn', sans-serif;
            color: #eee;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            background-color: #1e1e1e;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.5);
            padding: 30px;
            text-align: center;
        }

        h1 {
            color: #fff;
        }

        .menu {
            margin-top: 30px;
            list-style: none;
            padding: 0;
        }

        .menu li {
            background-color: #03a9f4;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
        }

        .menu li:hover {
            background-color: #0288d1;
        }

        .menu a {
            color: #fff;
            text-decoration: none;
            display: block;
        }
    </style>
</head>
<body>

<main class="container">
    <h1>پنل مدیریت خوش آمدید</h1>
    <ul class="menu">
        <li><a href="manage_comments.php">مدیریت کامنت‌ها</a></li>
        <li><a href="admin.php">مدیریت مکمل</a></li>
        <li><a href="index2.php">🔙 Back to Home</a></li>
    </ul>
</main>

</body>
</html>
