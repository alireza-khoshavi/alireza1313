<?php
include("hed.html");

// اتصال به دیتابیس
$link = new mysqli("localhost", "root", "", "my_database");
if ($link->connect_error) {
    die("<div class='alert alert-danger text-center mt-4'>❌ اتصال به دیتابیس با خطا مواجه شد: " . $link->connect_error . "</div>");
}

// دریافت اخبار
$result = $link->query("SELECT * FROM news ORDER BY id DESC");
?>

<div class="container mt-5 pt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="section-title">📰 آخرین اخبار</h3>
        <a href="news_add.php" class="btn btn-add-news">➕ افزودن خبر جدید</a>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col">
                    <div class="card news-card">
                        <img src="<?= !empty($row['imageurl']) ? htmlspecialchars($row['imageurl']) : 'https://via.placeholder.com/600x200?text=No+Image' ?>" 
                             class="card-img-top news-image" 
                             alt="News Image" 
                             loading="lazy">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
                            <p class="news-date">🗓 <?= isset($row['created_at']) ? date("Y/m/d", strtotime($row['created_at'])) : 'تاریخ نامشخص' ?></p>
                            <p class="card-text news-text"><?= mb_strimwidth(htmlspecialchars($row['text']), 0, 120, '...') ?></p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="news_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-edit">✏ ویرایش</a>
                            <a href="news_delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-delete" onclick="return confirm('آیا از حذف این خبر مطمئن هستید؟')">🗑 حذف</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="alert alert-warning text-center col-12 mt-4">⛔ هیچ خبری یافت نشد.</div>
        <?php endif; ?>
    </div>
</div>

<?php
$link->close();
include("foter.html");
?>

<!-- 🌟 استایل حرفه‌ای نهایی -->
<style>
    body {
        background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        color: #f1f1f1;
        font-family: 'IRANSans', sans-serif;
    }

    .section-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: #ffc107;
        border-bottom: 2px solid #ffc107;
        display: inline-block;
        padding-bottom: 6px;
    }

    .btn-add-news {
        background: #ffc107;
        color: #000;
        font-weight: bold;
        padding: 8px 18px;
        border-radius: 12px;
        transition: 0.3s;
        box-shadow: 0 0 10px #ffc10770;
    }

    .btn-add-news:hover {
        background: #ffca2c;
        transform: scale(1.05);
    }

    .news-card {
        background: rgba(255, 255, 255, 0.05);
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(8px);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        animation: fadeInUp 0.6s ease-in-out;
    }

    .news-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.6);
    }

    .news-image {
        height: 200px;
        object-fit: cover;
        filter: brightness(0.9);
    }

    .news-date {
        color: #bbb;
        font-size: 0.85rem;
        margin-bottom: 10px;
    }

    .news-text {
        color: #ddd;
        min-height: 60px;
        font-size: 0.95rem;
    }

    .card-footer {
        background: transparent;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding: 0.75rem 1rem;
    }

    .btn-edit,
    .btn-delete {
        font-weight: bold;
        padding: 6px 14px;
        border-radius: 10px;
        transition: 0.3s;
    }

    .btn-edit {
        color: #28a745;
        border: 1px solid #28a745;
        background: transparent;
    }

    .btn-edit:hover {
        background-color: #28a745;
        color: white;
    }

    .btn-delete {
        color: #dc3545;
        border: 1px solid #dc3545;
        background: transparent;
    }

    .btn-delete:hover {
        background-color: #dc3545;
        color: white;
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
