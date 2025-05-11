<?php
session_start();

// اطلاعات دیتابیس
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "my_database";  // نام دیتابیس جدید خود را وارد کنید

// اتصال به دیتابیس
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// بررسی اتصال به دیتابیس
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// پردازش فرم ثبت‌نام
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);

    // بررسی اینکه آیا ایمیل قبلاً ثبت شده
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // ایمیل قبلاً ثبت شده
        $_SESSION['message'] = "⚠ This email is already registered!";
        $_SESSION['message_type'] = "danger";
        header("Location: signup.php");
        exit();
    }

    // رمزگذاری پسورد
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // ذخیره اطلاعات کاربر در دیتابیس
    $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $hashed_password);

    if ($stmt->execute()) {
        // ثبت‌نام موفقیت‌آمیز
        $_SESSION['message'] = "✅ Registration successful! Please login.";
        $_SESSION['message_type'] = "success";
        header("Location: register.php");
        exit();
    } else {
        // خطا در ثبت‌نام
        $_SESSION['message'] = "❌ Registration failed! Please try again.";
        $_SESSION['message_type'] = "danger";
        header("Location: signup.php");
        exit();
    }
}

$conn->close();
?>
