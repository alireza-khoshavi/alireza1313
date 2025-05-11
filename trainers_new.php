<?php include("hed.html"); ?>

<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trainers - Our Elite Team</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" href="images/favicon.ico">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Roboto', sans-serif;
      background-color: #121212;
      color: #f4f4f4;
      line-height: 1.6;
    }

    .main-container {
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    /* بخش معرفی مربیان */
    .trainers-section {
      padding: 80px 20px;
      text-align: center;
      background-color: #1e1e1e;
      border-radius: 20px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
      transition: all 0.3s ease;
    }

    .trainers-section:hover {
      box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
    }

    .section-header h2 {
      font-size: 3.5rem;
      color: #e3e3e3;
      margin-bottom: 15px;
      text-transform: uppercase;
      letter-spacing: 1px;
      text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
    }

    .section-header p {
      font-size: 1.1rem;
      color: #bbb;
      margin-bottom: 40px;
      text-shadow: 0 0 5px rgba(255, 255, 255, 0.3);
    }

    .trainers-cards {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 30px;
      margin-top: 40px;
    }

    .trainer-card {
      width: 22%;
      background-color: #333;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
      transition: all 0.3s ease;
      margin-bottom: 30px;
      cursor: pointer;
      position: relative;
      opacity: 0.95;
    }

    .trainer-card:hover {
      transform: translateY(-15px);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
      opacity: 1;
    }

    .trainer-card img {
      width: 100%;
      height: 250px;
      object-fit: cover;
      transition: all 0.3s ease;
      filter: brightness(80%);
    }

    .trainer-card img:hover {
      filter: brightness(100%);
    }

    .trainer-card h5 {
      font-size: 1.5rem;
      padding: 20px;
      color: #fff;
      text-transform: uppercase;
      letter-spacing: 2px;
      text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
      background-color: rgba(0, 0, 0, 0.5);
      position: absolute;
      bottom: 0;
      width: 100%;
      text-align: center;
      margin: 0;
    }

    /* بخش ویدیوها */
    .video-section {
      padding: 80px 20px;
      background-color: #181818;
      text-align: center;
      border-radius: 20px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
      margin-top: 60px;
    }

    .video-section:hover {
      box-shadow: 0 35px 70px rgba(0, 0, 0, 0.4);
    }

    .video-cards {
      display: flex;
      justify-content: space-between;
      gap: 30px;
      flex-wrap: wrap;
    }

    .video-card {
      width: 48%;
      background-color: #333;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
      transition: all 0.3s ease;
    }

    iframe {
      width: 100%;
      height: 350px;
      border: none;
      border-radius: 15px;
    }

    .video-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
    }

    /* فوتر */
    footer {
      text-align: center;
      padding: 20px;
      background-color: #1e1e1e;
      color: #bbb;
      margin-top: 60px;
      border-radius: 20px;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
    }

    footer p {
      font-size: 1.1rem;
    }
  </style>
</head>
<body>
  <div class="main-container">
    <!-- بخش معرفی مربیان -->
    <section class="trainers-section">
      <div class="section-header">
        <h2>Meet Our Elite Trainers</h2>
        <p>Our certified trainers are here to help you achieve your fitness goals!</p>
      </div>

      <div class="trainers-cards">
        <!-- Trainer 1 -->
        <div class="trainer-card">
          <img src="images/imagesyt.jpg" alt="Sahar Javadzadeh">
          <h5>Sahar Javadzadeh</h5>
        </div>

        <!-- Trainer 2 -->
        <div class="trainer-card">
          <img src="images/9fd890f12ee7293986a5e6f9bcff815f.jpg" alt="Sahar Rahmani">
          <h5>Sahar Rahmani</h5>
        </div>

        <!-- Trainer 3 -->
        <div class="trainer-card">
          <img src="images/imageshsser.jpg" alt="Vahid Badpi">
          <h5>Vahid Badpi</h5>
        </div>

        <!-- Trainer 4 -->
        <div class="trainer-card">
          <img src="images/63207708.jpg" alt="Hadi Choopan">
          <h5>Hadi Choopan</h5>
        </div>
      </div>
    </section>

    <!-- بخش ویدیوها -->
    <section class="video-section">
      <div class="section-header">
        <h2>Watch Our Training Videos</h2>
        <p>Get motivated by watching our professional trainers in action!</p>
      </div>

      <div class="video-cards">
        <!-- Video 1 -->
        <div class="video-card">
          <iframe src="https://www.youtube.com/embed/hKZPNXlmjU4" allowfullscreen></iframe>
        </div>
        <!-- Video 2 -->
        <div class="video-card">
          <iframe src="https://www.youtube.com/embed/6Rjbrk1uyuw" allowfullscreen></iframe>
        </div>
        <!-- Video 3 -->
        <div class="video-card">
          <iframe src="https://www.youtube.com/embed/wbo6_llFgGQ" allowfullscreen></iframe>
        </div>
        <!-- Video 4 -->
        <div class="video-card">
          <iframe src="https://www.youtube.com/embed/zIGyyGZzr7Y" allowfullscreen></iframe>
        </div>
      </div>
    </section>

    <!-- فوتر -->
    <footer>
      <p>&copy; 2025 GymElite. All Rights Reserved.</p>
    </footer>
  </div>

  <script src="scripts.js"></script>
</body>
</html>

