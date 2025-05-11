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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- استایل حرفه‌ای -->
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background: url('images/240_F_310057758_qaifc4EqCRFiweXqZvNVChEskMJCifSO.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            background: rgba(20, 20, 20, 0.8);
            backdrop-filter: blur(10px);
            padding: 35px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.7);
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: bold;
            color: #f0f0f0;
            font-size: 1.5rem;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #ffffff;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 1rem;
            transition: background 0.3s, box-shadow 0.3s;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.2);
            border-color: #66b0ff;
        }

        .btn-primary {
            background: linear-gradient(135deg, #007bff, #0056b3);
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: bold;
            transition: background 0.3s ease-in-out;
            font-size: 1rem;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #339aff, #004699);
        }

        p {
            text-align: center;
            margin-top: 15px;
            font-size: 0.95rem;
        }

        a {
            color: #66b0ff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        .alert {
            font-size: 0.9rem;
            padding: 10px 15px;
            border-radius: 6px;
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 25px 20px;
            }

            h2 {
                font-size: 1.3rem;
            }

            .btn-primary {
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>🔐 Login</h2>

    <?php
    if (isset($_SESSION['message'])) {
        echo "<div class='alert alert-" . $_SESSION['message_type'] . "' role='alert'>" . $_SESSION['message'] . "</div>";
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }
    ?>

    <form action="login_check.php" method="POST">
        <input type="email" name="email" class="form-control" placeholder="Email" required />
        <input type="password" name="password" class="form-control" placeholder="Password" required />
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>

    <p class="mt-3">Don't have an account? <a href="signup.php">Sign up here</a></p>
</div>

</body>
</html>


