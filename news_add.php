<?php include("heder.html"); ?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>افزودن خبر جدید</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
  <style>
    :root {
      --bg: #0f0f0f;
      --card-bg: #1a1a1a;
      --accent: #00e0d6;
      --hover-accent: #00bfb3;
      --text: #f1f1f1;
      --muted: #999;
      --danger: #f44336;
      --border: #333;
    }

    * {
      box-sizing: border-box;
    }

    body {
      background: linear-gradient(135deg, #0f0f0f, #1a1a1a);
      color: var(--text);
      font-family: 'Vazirmatn', sans-serif;
      margin: 0;
      padding-bottom: 100px;
    }

    .form-card {
      background: var(--card-bg);
      max-width: 850px;
      margin: 80px auto;
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 0 50px rgba(0, 255, 204, 0.05), 0 0 20px rgba(0, 255, 204, 0.1);
      position: relative;
      overflow: hidden;
    }

    .form-card::before {
      content: '';
      position: absolute;
      width: 200%;
      height: 200%;
      top: -50%;
      left: -50%;
      background: conic-gradient(var(--accent), transparent, var(--accent));
      animation: spin 10s linear infinite;
      opacity: 0.03;
      z-index: 0;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .form-card * {
      position: relative;
      z-index: 1;
    }

    h2 {
      text-align: center;
      font-weight: 700;
      color: var(--accent);
      margin-bottom: 15px;
    }

    .form-card p {
      text-align: center;
      color: var(--muted);
      margin-bottom: 30px;
    }

    .form-label {
      font-weight: 600;
      margin-bottom: 8px;
      color: var(--text);
    }

    .form-control {
      background-color: #2b2b2b;
      color: var(--text);
      border: 1px solid var(--border);
      padding: 12px 14px;
      border-radius: 12px;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: var(--accent);
      box-shadow: 0 0 0 0.25rem rgba(0, 224, 214, 0.2);
    }

    .form-control::placeholder {
      color: #888;
    }

    .btn-submit {
      background: var(--accent);
      color: #000;
      font-size: 18px;
      font-weight: bold;
      border-radius: 40px;
      padding: 14px 38px;
      transition: 0.4s ease-in-out;
      border: none;
    }

    .btn-submit:hover {
      background: var(--hover-accent);
      transform: translateY(-2px);
      box-shadow: 0 8px 15px rgba(0, 224, 214, 0.2);
    }

    .invalid-feedback {
      color: var(--danger);
      font-size: 14px;
    }

    @media screen and (max-width: 768px) {
      .form-card {
        margin: 30px 20px;
        padding: 25px;
      }
    }
  </style>
</head>
<body>

<div class="form-card">
  <h2>📢 افزودن خبر جدید</h2>
  <p>لطفاً اطلاعات خبر را به‌صورت کامل وارد نمایید</p>

  <form action="news_add_action.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
    <div class="mb-3">
      <label for="image" class="form-label">📷 تصویر خبر</label>
      <input type="file" class="form-control" name="image" id="image" accept=".jpg,.jpeg,.png,.webp" required>
      <div class="invalid-feedback">لطفاً یک تصویر معتبر انتخاب کنید (jpg, png, webp).</div>
    </div>

    <div class="mb-3">
      <label for="title" class="form-label">📰 عنوان خبر</label>
      <input type="text" class="form-control" name="title" id="title" placeholder="مثال: عرضه نسخه جدید وب‌سایت" required>
      <div class="invalid-feedback">عنوان خبر الزامی است.</div>
    </div>

    <div class="mb-4">
      <label for="text" class="form-label">📝 متن خبر</label>
      <textarea class="form-control" name="text" id="text" rows="6" placeholder="متن کامل خبر را بنویسید..." required></textarea>
      <div class="invalid-feedback">متن خبر نباید خالی باشد.</div>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-submit">💾 ذخیره خبر</button>
    </div>
  </form>
</div>

<script>
  (() => {
    'use strict';
    const forms = document.querySelectorAll('.needs-validation');
    forms.forEach(form => {
      form.addEventListener('submit', e => {
        if (!form.checkValidity()) {
          e.preventDefault();
          e.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  })();
</script>

</body>
</html>
