<?php
include("heder.html");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // اتصال به پایگاه داده
    $link = mysqli_connect("localhost", "root", "", "onenews");
    if (!$link) {
        die("❌ خطا در اتصال به دیتابیس: " . mysqli_connect_error());
    }

    // بررسی وجود فیلد id
    if (!isset($_POST["id"]) || !is_numeric($_POST["id"])) {
        echo "<div class='alert alert-danger text-center'>⛔ شناسه خبر معتبر نیست!</div>";
        exit;
    }

    $id = intval($_POST["id"]);
    $title = mysqli_real_escape_string($link, trim($_POST["title"]));
    $text = mysqli_real_escape_string($link, trim($_POST["text"]));

    // دریافت آدرس تصویر قبلی از پایگاه داده
    $query = "SELECT imageurl FROM news WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $currentImageUrl);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    // بررسی آپلود فایل جدید
    if (!empty($_FILES["image"]["name"])) {
        $allowedTypes = ["image/jpeg", "image/png", "image/gif"];
        $maxSize = 2 * 1024 * 1024; // 2MB
        $imageType = $_FILES["image"]["type"];
        $imageSize = $_FILES["image"]["size"];

        if (!in_array($imageType, $allowedTypes)) {
            exit("<div class='alert alert-danger text-center'>❌ فقط فرمت‌های JPG, PNG و GIF مجاز هستند.</div>");
        }

        if ($imageSize > $maxSize) {
            exit("<div class='alert alert-danger text-center'>❌ حجم تصویر نباید بیشتر از ۲ مگابایت باشد.</div>");
        }

        $newImageUrl = "images/" . time() . "_" . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $newImageUrl);
    } else {
        $newImageUrl = $currentImageUrl;
    }

    // به‌روزرسانی خبر
    $update = "UPDATE news SET title = ?, text = ?, imageurl = ? WHERE id = ?";
    $updateStmt = mysqli_prepare($link, $update);
    mysqli_stmt_bind_param($updateStmt, "sssi", $title, $text, $newImageUrl, $id);

    if (mysqli_stmt_execute($updateStmt)) {
        echo "<div class='alert alert-success text-center'>✅ خبر با موفقیت ویرایش شد!</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>❌ خطا در به‌روزرسانی خبر!</div>";
    }

    mysqli_stmt_close($updateStmt);
    mysqli_close($link);
} else {
    echo "<div class='alert alert-warning text-center'>⛔ درخواست نامعتبر است!</div>";
}
?>
