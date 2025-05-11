<?php
session_start();

// Sanitize function to prevent XSS
function sanitize($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = sanitize($_POST['username'] ?? '');
    $password = sanitize($_POST['password'] ?? '');

    // Basic credentials (replace with DB check later)
    $valid_user = 'alireza';
    $valid_pass = '19571957';

    if ($username === $valid_user && $password === $valid_pass) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Admin Login | My Site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1c1c1c, #121212);
            font-family: 'Vazirmatn', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: #eee;
        }

        .login-card {
            background-color: #222;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            padding: 40px;
            width: 100%;
            max-width: 400px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .login-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
        }

        .login-card h1 {
            text-align: center;
            font-size: 24px;
            color: #f5f5f5;
            margin-bottom: 30px;
        }

        label {
            font-size: 15px;
            margin-bottom: 6px;
            display: block;
            color: #ccc;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #444;
            background-color: #333;
            color: #fff;
            font-size: 15px;
        }

        input::placeholder {
            color: #999;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #03a9f4;
            color: #fff;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0288d1;
        }

        .error-message {
            color: #f44336;
            font-size: 14px;
            text-align: center;
            margin-top: 15px;
        }

        /* Fixed menu styling */
        .fixed-menu {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: rgba(34, 34, 34, 0.95);
            padding: 12px 18px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.5);
            z-index: 999;
            direction: ltr;
        }

        .fixed-menu a {
            color: #fff;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            font-family: 'Vazirmatn', sans-serif;
            font-size: 14px;
        }

        .fixed-menu a:hover {
            text-decoration: underline;
            color: #03a9f4;
        }
    </style>
</head>
<body>

<!-- ✅ Fixed Menu -->
<div class="fixed-menu">
    <a href="index.php">🏠 Home</a>
</div>

<!-- ✅ Login Form -->
<div class="login-card">
    <h1>Admin Login</h1>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="e.g. alireza" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="••••••••" required>

        <button type="submit">Login</button>
    </form>

    <?php if (!empty($error)) : ?>
        <p class="error-message"><?= $error ?></p>
    <?php endif; ?>
</div>

</body>
</html>

