<?php
ob_start(); // شروع بافر خروجی

include("heder.html");

function connectToDatabase() {
    $link = mysqli_connect("localhost", "root", "", "onenews");
    if (!$link) {
        handleError("❌ اتصال به دیتابیس ناموفق بود: " . mysqli_connect_error());
    }
    return $link;
}

function handleError($message) {
    echo '<div class="alert alert-danger">' . $message . '</div>';
    exit;  // Exit after error to prevent further processing
}

function deleteNewsById($link, $id) {
    $query = "DELETE FROM news WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true;
        } else {
            mysqli_stmt_close($stmt);
            return false;
        }
    } else {
        return false;
    }
}

$id = isset($_GET["id"]) ? filter_var($_GET["id"], FILTER_VALIDATE_INT) : 0;

if ($id > 0) {
    $link = connectToDatabase();
    if (deleteNewsById($link, $id)) {
        echo '<div class="alert alert-success">✅ خبر با موفقیت حذف شد. <a href="admin.php">بازگشت به مدیریت اخبار</a></div>';
        header("Refresh: 2; url=admin.php"); // Redirect to admin page after 2 seconds
        exit; // Ensure no further output occurs
    } else {
        handleError("❌ خطا در حذف خبر. لطفاً دوباره تلاش کنید.");
    }
    mysqli_close($link);
} else {
    handleError("⛔ هیچ خبری برای حذف انتخاب نشده است.");
}

ob_end_flush(); // ارسال بافر خروجی و پاک کردن آن
?>
