<?php
session_start();

// اطلاعات دیتابیس
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "my_database"; // نام دیتابیس جدید شما

$conn = new mysqli($servername, $db_username, $db_password, $dbname);
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $password = isset($_POST['password']) ? trim($_POST['password']) : "";

    // بررسی خالی نبودن فیلدها
    if (empty($email) || empty($password)) {
        $_SESSION['message'] = "⚠ Please enter both email and password.";
        $_SESSION['message_type'] = "warning";
        header("Location: register.php");
        exit();
    }

    // دریافت اطلاعات کاربر
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            header("Location: index2.php"); // هدایت به صفحه اصلی پس از ورود موفق
            exit();
        } else {
            $_SESSION['message'] = "❌ Incorrect password.";
            $_SESSION['message_type'] = "danger";
            header("Location: register.php"); // هدایت به صفحه ثبت‌نام در صورت اشتباه بودن رمز
            exit();
        }
    } else {
        $_SESSION['message'] = "❌ No account found with this email.";
        $_SESSION['message_type'] = "danger";
        header("Location: register.php"); // هدایت به صفحه ثبت‌نام در صورت وجود نداشتن ایمیل
        exit();
    }
}
?>

