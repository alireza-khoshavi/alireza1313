<?php
include("heder.html");
$link = mysqli_connect("localhost", "root", "", "my_database");
if (!$link) {
    die("❌ اتصال به دیتابیس ناموفق بود: " . mysqli_connect_error());
}

$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;
$title = $text = $image = "";

if ($id) {
    $query = "SELECT title, text, imageurl FROM news WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $title, $text, $image);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
}

$formAction = $id ? "news_edit_action.php" : "news_add_action.php";
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $id ? "ویرایش خبر" : "افزودن خبر جدید"; ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
  <style>
    :root {
      --bg-dark: #1b1b1b;
      --card-bg: #2a2a2a;
      --text-light: #f1f1f1;
      --accent: #00bcd4;
      --error: #ff5252;
      --border-color: #444;
    }

    body {
      background-color: var(--bg-dark);
      font-family: 'Vazirmatn', sans-serif;
      color: var(--text-light);
      padding-bottom: 80px;
    }

    .form-card {
      background-color: var(--card-bg);
      border-radius: 16px;
      padding: 40px;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
      max-width: 800px;
      margin: 60px auto;
      transition: transform 0.3s ease-in-out;
    }

    .form-card:hover {
      transform: scale(1.02);
    }

    .form-card h3 {
      font-weight: 600;
      margin-bottom: 20px;
      color: var(--accent);
    }

    .form-card label {
      color: #ccc;
      font-size: 16px;
      margin-bottom: 6px;
    }

    .form-control {
      background-color: #333;
      color: var(--text-light);
      border: 1px solid var(--border-color);
      border-radius: 12px;
      padding: 12px;
      transition: border-color 0.3s;
    }

    .form-control:focus {
      border-color: var(--accent);
      box-shadow: 0 0 0 0.2rem rgba(0, 188, 212, 0.25);
    }

    .btn-submit {
      background-color: var(--accent);
      border: none;
      padding: 12px 30px;
      border-radius: 30px;
      font-weight: bold;
      font-size: 18px;
      transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
      background-color: #0097a7;
    }

    .invalid-feedback {
      color: var(--error);
    }

    #imagePreview {
      max-width: 200px;
      margin-top: 15px;
    }

    @media (max-width: 768px) {
      .form-card {
        margin: 20px;
        padding: 25px;
      }
    }
  </style>
</head>
<body>

<div class="form-card">
  <h3 class="text-center"><?php echo $id ? "ویرایش خبر" : "افزودن خبر جدید"; ?></h3>

  <form action="<?php echo $formAction; ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
    <div class="mb-3">
      <label for="image" class="form-label">📷 تصویر خبر</label>
      <input type="file" class="form-control" name="image" id="image" <?php echo !$id ? "required" : ""; ?> accept="image/*" onchange="previewImage(event)">
      <div class="invalid-feedback">لطفاً تصویر را انتخاب کنید.</div>
    </div>

    <div class="text-center">
      <?php if ($image): ?>
        <img id="imagePreview" src="<?php echo htmlspecialchars($image); ?>" class="img-thumbnail">
      <?php else: ?>
        <img id="imagePreview" src="#" class="img-thumbnail d-none">
      <?php endif; ?>
    </div>

    <div class="mb-3">
      <label for="title" class="form-label">📰 عنوان خبر</label>
      <input type="text" class="form-control" name="title" id="title" value="<?php echo htmlspecialchars($title); ?>" placeholder="عنوان خبر را وارد کنید" required>
      <div class="invalid-feedback">لطفاً عنوان خبر را وارد کنید.</div>
    </div>

    <div class="mb-4">
      <label for="text" class="form-label">📝 متن خبر</label>
      <textarea class="form-control" name="text" id="text" rows="5" required><?php echo htmlspecialchars($text); ?></textarea>
      <div class="invalid-feedback">لطفاً متن خبر را وارد کنید.</div>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-submit">💾 ذخیره خبر</button>
    </div>
  </form>
</div>

<script>
  // Image preview
  function previewImage(event) {
    const preview = document.getElementById('imagePreview');
    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.classList.remove('d-none');
  }

  // Bootstrap validation
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
