<?php 
include("heder.html");
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>نتیجه ثبت خبر</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
  <style>
    body {
      background: linear-gradient(135deg, #0f0f0f, #1a1a1a);
      color: #fff;
      font-family: 'Vazirmatn', sans-serif;
      padding: 40px 20px;
    }
    .response-box {
      max-width: 600px;
      margin: 100px auto;
      padding: 30px;
      background-color: #222;
      border-radius: 16px;
      box-shadow: 0 0 25px rgba(0, 224, 214, 0.1);
      text-align: center;
      animation: fadeIn 0.8s ease-out;
    }
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .response-box h1 {
      font-size: 24px;
      margin-bottom: 20px;
      color: #00e0d6;
    }
    .alert {
      font-size: 18px;
      border-radius: 12px;
      padding: 15px;
    }
  </style>
</head>
<body>
<div class="response-box">
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $link = mysqli_connect("localhost", "root", "", "my_database");
    if (!$link) {
        echo "<div class='alert alert-danger'>❌ اتصال به دیتابیس ناموفق بود: " . mysqli_connect_error() . "</div>";
        exit;
    }

    $title = mysqli_real_escape_string($link, trim($_POST["title"]));
    $text = mysqli_real_escape_string($link, trim($_POST["text"]));

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {
        $allowedTypes = ["image/jpeg", "image/png", "image/webp", "image/gif"];
        $maxSize = 2 * 1024 * 1024;
        $imageType = $_FILES["image"]["type"];
        $imageSize = $_FILES["image"]["size"];

        if (!in_array($imageType, $allowedTypes)) {
            echo "<div class='alert alert-danger'>❌ فرمت تصویر باید jpg یا png یا webp یا gif باشد!</div>";
            exit;
        }

        if ($imageSize > $maxSize) {
            echo "<div class='alert alert-danger'>❌ حجم تصویر بیش از ۲ مگابایت است!</div>";
            exit;
        }

        $targetDir = "images/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $imagePath = $targetDir . uniqid("img_", true) . "." . $extension;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
            $stmt = mysqli_prepare($link, "INSERT INTO news (title, text, imageurl) VALUES (?, ?, ?)");
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "sss", $title, $text, $imagePath);
                if (mysqli_stmt_execute($stmt)) {
                    echo "<div class='alert alert-success'>✅ خبر با موفقیت ذخیره شد.</div>";
                } else {
                    echo "<div class='alert alert-danger'>❌ خطا در ذخیره خبر: " . mysqli_stmt_error($stmt) . "</div>";
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "<div class='alert alert-danger'>❌ آماده‌سازی کوئری با مشکل مواجه شد!</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>❌ آپلود تصویر با شکست مواجه شد!</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>❌ لطفاً یک تصویر معتبر انتخاب کنید!</div>";
    }

    mysqli_close($link);
}
?>
</div>
</body>
</html>