<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trang Tìm Sách</title>
  <link rel="stylesheet" href="<?php echo BASE_URL . "/public/css/styleT.css" ?>">
</head>
<body>

  <?php include 'header.php'; ?>

  <!-- Nội dung chính của trang -->
  <main class="main-content">
    <?php include $view; ?>
  </main>

  <?php include 'footer.php'; ?>

</body>
</html>