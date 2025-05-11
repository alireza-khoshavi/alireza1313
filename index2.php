<?php
session_start();

// چک ورود کاربر
if (!isset($_SESSION['user_id'])) {
    header("Location: register.php");
    exit();
}

// اتصال به دیتابیس
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "my_database";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);
if ($conn->connect_error) {
    die("اتصال به پایگاه داده با خطا مواجه شد: " . $conn->connect_error);
}

// دریافت نام کاربر
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT name FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($name);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<?php include("hed.html"); ?>

<!-- استایل حرفه‌ای فارسی و دارک -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Vazirmatn&display=swap');

    body {
        direction: rtl;
        font-family: 'Vazirmatn', sans-serif;
        background: linear-gradient(to left, #0d0d0d, #1a1a1a);
        color: #eee;
        margin: 0;
        padding: 0;
    }

    .welcome-box {
        margin-top: 100px;
        padding: 40px;
        background: #1e1e1e;
        border-radius: 20px;
        box-shadow: 0 0 25px #ff007f;
        max-width: 600px;
        margin-right: auto;
        margin-left: auto;
        text-align: center;
    }

    .welcome-box h2 {
        font-size: 2.8rem;
        margin-bottom: 20px;
        color: #ff007f;
    }

    .welcome-box p {
        font-size: 1.3rem;
        margin-bottom: 25px;
    }

    .logout-btn {
        padding: 12px 30px;
        background: transparent;
        border: 2px solid #ff007f;
        color: #ff007f;
        font-weight: bold;
        border-radius: 50px;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .logout-btn:hover {
        background-color: #ff007f;
        color: #fff;
    }
</style>

<!-- نمایش خوش‌آمدگویی -->
<div class="welcome-box">
    <h2>سلام <?php echo htmlspecialchars($name); ?> 👋</h2>
    <p>به پنل اختصاصی‌ات خوش اومدی. آماده‌ای شروع کنیم؟ 💪</p>
    <a href="logout.php" class="logout-btn">خروج</a>
</div>

<?php include("home.html"); ?>
<?php include("foter.html"); ?>
