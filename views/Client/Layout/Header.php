<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trang Tìm Sách</title>
  <link rel="stylesheet" href="<?php echo BASE_URL . "/public/css/styleT.css" ?>">
</head>

<body>
  <header class="header">
    <div class="container">
    <div> <a href="index.php?act=/" class="logo">BOOKNEXT</a></div>
      <div class="search-bar">
        <input type="text" placeholder="Tìm kiếm sách...">
        <button type="submit">🔍</button>
      </div>
      <div class="icons">
        <span title="Giỏ hàng" class="cart-icon">
          <span class="icon">🛒</span><sup class="cart-count">2</sup>
        </span>
        <span title="Thông báo">🔔</span>
        <span title="Tài khoản">👤 hia…</span>
      </div>
    </div>
  </header>

  <!-- Menu riêng biệt bên dưới header -->
  <nav class="nav">
    <div class="nav-container">
      <a href="index.php?act=/">Trang chủ</a>
      <a href="index.php?act=product">Sách</a>
      <a href="index.php?act=lienhe">Liên hệ</a>
    </div>
  </nav>


</body>

</html>