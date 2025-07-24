<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL . "/public/css/style.css" ?>">
    <title>Document</title>
</head>

<body>
  <aside class="admin-sidebar">
  <div class="sidebar-header">
    <h2>Admin</h2>
  </div>
  <nav class="sidebar-nav">
     <a href="<?php echo BASE_URL . '?act=dashboard' ?>"><i class="fas fa-chart-line"></i> Thống kê</a>
    <a href="<?php echo BASE_URL . '?act=banner' ?>"><i class="fas fa-image"></i> Banner</a>
    <a href="<?php echo BASE_URL . '?act=category' ?>"><i class="fas fa-list"></i> Danh mục</a>
    <a href="<?php echo BASE_URL . '?act=book' ?>"><i class="fas fa-book"></i> Quản lý sách</a>
    <a href="<?php echo BASE_URL . '?act=user' ?>"><i class="fas fa-users"></i> Người dùng</a>
    <a href="<?php echo BASE_URL . '?act=order' ?>"><i class="fas fa-shopping-cart"></i> Đơn hàng</a>
    <a href="<?php echo BASE_URL . '?act=comment' ?>"><i class="fas fa-comments"></i> Bình luận</a>
</nav>

  </nav>
</aside>
</body>

</html>