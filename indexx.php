<?php
include("heder.html");

// اتصال به دیتابیس
$link = new mysqli("localhost", "root", "", "my_database");

// بررسی اتصال
if ($link->connect_error) {
    die("<div class='alert alert-danger text-center'>❌ Database connection failed: " . $link->connect_error . "</div>");
}

// بررسی اینکه ستون created_at در دیتابیس وجود دارد
$column_check = $link->query("SHOW COLUMNS FROM news LIKE 'created_at'");
if ($column_check->num_rows > 0) {
    $order_by = "ORDER BY created_at DESC"; // اگر ستون وجود داشت، مرتب‌سازی بر اساس آن
} else {
    $order_by = "ORDER BY id DESC"; // در غیر این صورت، مرتب‌سازی بر اساس ID
}

// دریافت اخبار
$result = $link->query("SELECT * FROM news $order_by");

// بررسی وجود اخبار
if ($result->num_rows > 0): ?>
    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col">
                    <div class="card h-100 shadow-lg news-card">
                        <img src="<?= !empty($row['imageurl']) ? htmlspecialchars($row['imageurl']) : 'images/default-news.jpg' ?>" 
                             class="card-img-top news-image" 
                             alt="News Image" 
                             loading="lazy">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
                            <p class="card-text text-muted small">
                                🗓 <?= isset($row['created_at']) ? date("F j, Y", strtotime($row['created_at'])) : 'Unknown Date' ?>
                            </p>
                            <p class="card-text news-text"><?= nl2br(htmlspecialchars($row['text'])) ?></p>
                            <a href="news_details.php?id=<?= $row['id'] ?>" class="btn btn-outline-primary">Read More →</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-warning text-center mt-4">⛔ No news available.</div>
<?php endif;

// بستن اتصال
$link->close();
?>

<style>
    .news-card {
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }
    .news-image {
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }
    .news-text {
        height: 60px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>
