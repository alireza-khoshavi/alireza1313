<?php
session_start();
include("hed.html");
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مکمل‌های ورزشی و اخبار</title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #121212;
            margin: 0;
            padding: 0;
            color: #fff;
        }

        header {
            background-color: #222;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        .container {
            width: 90%;
            margin: 20px auto;
        }

        .supplement-info {
            text-align: center;
            padding: 40px 20px;
            background: linear-gradient(135deg, #6e7dff, #ff7e5f);
            border-radius: 15px;
            margin-bottom: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            transition: 0.3s;
        }

        .supplement-info:hover {
            transform: scale(1.03);
        }

        .supplement-info h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .supplement-info p {
            font-size: 1.1rem;
            width: 80%;
            margin: 0 auto;
            line-height: 1.8;
        }

        .supplement-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 50px;
        }

        .supplement-item {
            background-color: #333;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            overflow: hidden;
            transition: 0.3s;
        }

        .supplement-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.4);
        }

        .supplement-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .info {
            padding: 20px;
        }

        .info h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .info p {
            font-size: 1rem;
            line-height: 1.7;
            margin-bottom: 10px;
        }

        .info ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .info ul li {
            font-size: 0.95rem;
            margin-bottom: 8px;
        }

        .no-news {
            text-align: center;
            margin-top: 20px;
            font-size: 1.2rem;
            color: #bbb;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- توضیحات کلی مکمل‌ها -->
        <section class="supplement-info">
            <h2>افزایش قدرت و سلامت با مکمل‌های مناسب</h2>
            <p>مکمل‌های ورزشی ابزارهایی عالی برای بهبود عملکرد، افزایش حجم عضلات، بهبود ریکاوری و تقویت سلامت عمومی هستند. با انتخاب درست مکمل‌ها، می‌توانید به نتایج بهتری در مسیر فیتنس خود برسید.</p>
        </section>

        <!-- نمایش خبرهای موجود در سشن -->
        <?php if (isset($_SESSION['news'])): ?>
            <section class="supplement-section">
                <div class="supplement-item">
                    <img src="<?= htmlspecialchars($_SESSION['news']['image']) ?>" alt="<?= htmlspecialchars($_SESSION['news']['title']) ?>">
                    <div class="info">
                        <h3><?= htmlspecialchars($_SESSION['news']['title']) ?></h3>
                        <p><?= nl2br(htmlspecialchars($_SESSION['news']['text'])) ?></p>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <!-- مکمل‌های ثابت -->
        <section class="supplement-section">
            <div class="supplement-item">
                <img src="images/1526841998_H3vJ7" alt="Gainer">
                <div class="info">
                    <h3>گینر</h3>
                    <p>گینرها مناسب افرادی هستند که می‌خواهند به سرعت وزن و حجم عضله اضافه کنند.</p>
                    <ul>
                        <li>افزایش وزن سالم</li>
                        <li>رشد سریع عضلات</li>
                        <li>ریکاوری بهتر بعد تمرین</li>
                    </ul>
                </div>
            </div>

            <div class="supplement-item">
                <img src="images/images" alt="Omega-3">
                <div class="info">
                    <h3>اُمگا ۳</h3>
                    <p>اسیدهای چرب امگا ۳ برای سلامت قلب، مغز و کاهش التهاب حیاتی هستند.</p>
                    <ul>
                        <li>حفظ سلامت قلب</li>
                        <li>کاهش التهابات</li>
                        <li>بهبود عملکرد مغز</li>
                    </ul>
                </div>
            </div>

            <div class="supplement-item">
                <img src="images/9077167" alt="Creatine">
                <div class="info">
                    <h3>کراتین</h3>
                    <p>کراتین یکی از مکمل‌های موثر برای افزایش قدرت، توان و توده عضلانی است.</p>
                    <ul>
                        <li>افزایش قدرت</li>
                        <li>تقویت عملکرد ورزشی</li>
                        <li>رشد عضله</li>
                    </ul>
                </div>
            </div>

            <div class="supplement-item">
                <img src="images/860" alt="BCAAs">
                <div class="info">
                    <h3>BCAAs</h3>
                    <p>آمینو اسیدهای شاخه‌دار (BCAAs) در بهبود ریکاوری و جلوگیری از تحلیل عضلانی موثرند.</p>
                    <ul>
                        <li>کاهش خستگی عضلانی</li>
                        <li>افزایش استقامت</li>
                        <li>بهبود ریکاوری</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- خبرهای اضافه شده از دیتابیس -->
        <?php
        $link = mysqli_connect("localhost", "root", "", "onenews");

        if (!$link) {
            echo "<p class='no-news'>❌ اتصال به دیتابیس ناموفق بود.</p>";
        } else {
            $query = "SELECT * FROM news ORDER BY id DESC";
            $result = mysqli_query($link, $query);

            if (mysqli_num_rows($result) > 0) {
                echo '<section class="supplement-section">';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                    <div class="supplement-item">
                        <img src="' . htmlspecialchars($row['imageurl']) . '" alt="' . htmlspecialchars($row['title']) . '">
                        <div class="info">
                            <h3>' . htmlspecialchars($row['title']) . '</h3>
                            <p>' . nl2br(htmlspecialchars($row['text'])) . '</p>
                        </div>
                    </div>';
                }
                echo '</section>';
            } else {
                echo "<p class='no-news'>❗ خبری جهت نمایش وجود ندارد.</p>";
            }
            mysqli_close($link);
        }
        ?>
    </div>
</body>

<?php
include("foter.html");
?>
</html>



  