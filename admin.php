<?php
include("heder.html");

// دکمه بازگشت به پنل مدیریتی
echo '
<div style="text-align: left; margin: 20px;">
    <a href="dashboard.php" class="btn btn-dark" style="padding: 10px 20px; border-radius: 5px; text-decoration: none;">
        🔙 بازگشت به پنل مدیریتی
    </a>
</div>
';

// تنظیمات پایگاه داده
$host = "localhost";
$username = "root";
$password = "";
$dbname = "my_database";

// اتصال به پایگاه داده با PDO
try {
    $link = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("❌ اتصال به دیتابیس ناموفق بود: " . $e->getMessage());
}

// دریافت اخبار از دیتابیس
$query = "SELECT id, title, text, imageurl FROM news ORDER BY created_at DESC";
$stmt = $link->prepare($query);
$stmt->execute();
$news = $stmt->fetchAll(PDO::FETCH_ASSOC);

// بستن اتصال
$link = null;
?>
