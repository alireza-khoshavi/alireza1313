<?php
include("hed.html");
include_once("jdf.php"); // اضافه‌شده برای پشتیبانی از jdate
?>

<section class="mindbody-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 content-box">

        <h1 class="main-title">🧠 HEALTHY MIND | HEALTHY BODY 💪</h1>

        <div class="image-container">
          <img src="images/istockphoto-487449486-170667a.jpg" alt="Mind and Body" class="main-img">
        </div>

        <p class="text">
          داشتن ذهن سالم به ما قدرت می‌دهد که مسیر زندگی را با آگاهی طی کنیم. ذهن و بدن مکمل یکدیگرند و سلامت یکی، سلامت دیگری را تضمین می‌کند.
        </p>
        <p class="text">
          افکار، تغذیه، رفتار و سبک زندگی همگی تأثیر مستقیمی بر سلامت روان دارند. ذهن سالم یعنی داشتن انعطاف، آگاهی، خلاقیت و امید.
        </p>

        <h2 class="sub-title">🏃‍♀️ Exercise & Mental Health</h2>
        <div class="image-container">
          <img src="images/Healthy_Mind.jpg" alt="Exercise and Mental Health" class="main-img">
        </div>
        <p class="text">
          ورزش باعث آزاد شدن اندورفین می‌شود که تأثیر مثبتی روی خلق و خو و ذهن دارد. همچنین کمک می‌کند تا مغز از سموم پاک شده و خواب با کیفیت‌تری داشته باشید.
        </p>

        <h2 class="sub-title">✨ ویژگی‌های ذهن سالم</h2>
        <ul class="mind-list">
          <li>احساس راحتی با دیگران</li>
          <li>اعتماد به نفس و عزت‌نفس بالا</li>
          <li>تفکر مثبت و خلاقانه</li>
          <li>مسئولیت‌پذیری و خودشناسی</li>
          <li>مقابله مؤثر با طرد و شکست</li>
        </ul>

        <div class="image-container">
          <img src="images/gcbh-mental-well-being-infographic-english.doi_.10.26419-2Fpia.00037.002-scaled.jpg" alt="Mental Wellbeing" class="main-img">
        </div>

        <p class="text">
          افراد با ذهن سالم، تصمیم‌گیری بهتری دارند و راحت‌تر با چالش‌های زندگی کنار می‌آیند.
        </p>

 

      </div>
    </div>
  </div>
</section>

<!-- فونت Poppins از گوگل اضافه شده -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

<style>
  body {
    background-color: #121212;
    color: #e0e0e0;
    font-family: 'Poppins', sans-serif;
  }

  .mindbody-section {
    padding: 60px 0;
    background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
  }

  .main-title {
    text-align: center;
    font-size: 36px;
    font-weight: 700;
    color: #00e0ff;
    margin-bottom: 30px;
  }

  .sub-title {
    color: #00ff9c;
    font-size: 24px;
    margin-top: 40px;
    margin-bottom: 15px;
  }

  .content-box {
    background-color: rgba(0,0,0,0.6);
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 0 15px #00e0ff66;
  }

  .text {
    font-size: 16px;
    text-align: justify;
    margin-bottom: 15px;
  }

  .main-img {
    width: 100%;
    border-radius: 10px;
    margin: 20px 0;
    box-shadow: 0 0 12px #00e0ff88;
  }

  .mind-list {
    list-style: none;
    padding-left: 0;
    font-size: 16px;
    margin-top: 10px;
  }

  .mind-list li::before {
    content: "✔️ ";
    color: #00ff9c;
    margin-right: 5px;
  }

  .datetime-box {
    background: #1f1f1f;
    border-radius: 10px;
    padding: 15px;
    text-align: center;
    margin-top: 40px;
    box-shadow: 0 0 10px #00ff9c66;
  }

  @media (max-width: 768px) {
    .main-title {
      font-size: 28px;
    }
    .text {
      font-size: 14px;
    }
    .sub-title {
      font-size: 20px;
    }
  }
</style>

<?php include("foter.html"); ?>
