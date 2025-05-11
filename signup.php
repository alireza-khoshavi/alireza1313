<?php
session_start();

// اگر کاربر قبلاً وارد شده باشد، هدایت به صفحه اصلی
if (isset($_SESSION['user_id'])) {
    header("Location: index2.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- استایل سفارشی -->
    <style>
        body {
            background: #121212;
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-container {
            max-width: 450px;
            margin: auto;
            margin-top: 100px;
            background: #1e1e1e;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.6);
        }

        .form-control {
            background: #2a2a2a;
            color: #ffffff;
            border: none;
        }

        .form-control:focus {
            background: #333333;
            color: #ffffff;
            box-shadow: 0 0 5px rgba(255,255,255,0.2);
        }

        .btn-primary {
            background-color: #28a745;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1e7e34;
        }

        a {
            color: #66b0ff;
        }

        a:hover {
            color: #ffffff;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2 class="text-center mb-4">📝 Create an Account</h2>

    <?php
    if (isset($_SESSION['message'])) {
        echo "<div class='alert alert-" . $_SESSION['message_type'] . "' role='alert'>" . $_SESSION['message'] . "</div>";
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }
    ?>

    <form action="registerr.php" method="POST">
        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Full Name" required />
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required />
        </div>
        <div class="mb-3">
            <input type="text" name="phone" class="form-control" placeholder="Phone Number" required />
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required />
        </div>
        <button type="submit" class="btn btn-primary w-100">Create Account</button>
    </form>

    <p class="mt-3 text-center">Already have an account? <a href="register.php">Login here</a></p>
</div>

</body>
</html>
<!-- استایل سفارشی -->
<style>
    body {
        background: url('images/contact-img.jpg') no-repeat center center fixed;
        background-size: cover;
        color: #ffffff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-container {
        max-width: 450px;
        margin: auto;
        margin-top: 100px;
        background: rgba(30, 30, 30, 0.85); /* حالت نیمه‌شفاف */
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0,0,0,0.7);
    }

    .form-control {
        background: #2a2a2a;
        color: #ffffff;
        border: none;
    }

    .form-control:focus {
        background: #333333;
        color: #ffffff;
        box-shadow: 0 0 5px rgba(255,255,255,0.2);
    }

    .btn-primary {
        background-color: #28a745;
        border: none;
    }

    .btn-primary:hover {
        background-color: #1e7e34;
    }

    a {
        color: #66b0ff;
    }

    a:hover {
        color: #ffffff;
        text-decoration: underline;
    }
</style>

