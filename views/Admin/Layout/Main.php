<!-- admin_layout.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang quản trị</title>
  <link rel="stylesheet" href="<?php echo BASE_URL . "/public/css/style.css" ?>">
  <!-- Font Awesome hoặc các icon nếu cần -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  
  <?php include_once 'header.php'; ?>
 <div class="admin-container">
  <?php include_once 'sidebar.php'; ?>
  <main class="col-10 main-content">
      <?php include_once $view; ?>
    </main>
</div>

</body>
</html>
