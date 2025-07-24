<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>BOOKNEXT - Trang Chủ</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .banner {
      background: url('img/banner.jpg') center/cover no-repeat;
      text-align: center;
      padding: 100px 20px;
      color: white;
      background-color: #eee;
    }

    .categories {
      text-align: center;
      padding: 30px;
    }

    .category-list {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 15px;
      margin-top: 10px;
    }

    .category-list div {
      padding: 10px 20px;
      background-color: #eee;
      border-radius: 10px;
    }

    .products {
      padding: 30px;
       text-align: center;
    }

    .product-list {
      display: flex;
      gap: 15px;
      flex-wrap: wrap;
      justify-content: center;
    }

    .product {
      background: #fff;
      border: 1px solid #ddd;
      padding: 10px;
      width: 160px;
      text-align: center;
      border-radius: 10px;
    }

    .product img {
      max-width: 100%;
      height: 180px;
      object-fit: cover;
    }
  </style>
</head>
<body>

  <!-- Banner -->
  <section class="banner">
    <h1>Khám phá Bộ Sưu Tập</h1>
    <p>Đọc sách - Giá hợp lý</p>
  </section>

  <!-- Categories -->
 <section class="categories">
  <h2>DANH MỤC NỔI BẬT</h2>
  <div class="category-list">
    <div>
      <img src="images/ton_giao.jpg" alt="Tôn giáo" />
      <p>Tôn giáo - triết học</p>
    </div>
    <div>
      <img src="images/suc_khoe.jpg" alt="Sức khỏe" />
      <p>Sức khỏe - Y học</p>
    </div>
    <div>
      <img src="images/thieu_nhi.jpg" alt="Thiếu nhi" />
      <p>Thiếu nhi</p>
    </div>
    <div>
      <img src="images/giao_duc.jpg" alt="Giáo dục" />
      <p>Giáo dục</p>
    </div>
    <div>
      <img src="images/phat_trien.jpg" alt="Phát triển bản thân" />
      <p>Phát triển bản thân</p>
    </div>
    <div>
      <img src="images/kinh_te.jpg" alt="Kinh tế" />
      <p>Kinh tế</p>
    </div>
    <div>
      <img src="images/khoa_hoc.jpg" alt="Khoa học" />
      <p>Khoa học - Công nghệ</p>
    </div>
    <div>
      <img src="images/van_hoc.jpg" alt="Văn học" />
      <p>Văn học</p>
    </div>
  </div>
</section>

  <!-- Products -->
  <section class="products">
    <h2>SẢN PHẨM MỚI</h2>
    <div class="product-list">
      <div class="product">
        <img src="img/bian.jpg" alt="Bí ẩn của sự sống">
        <h3>Bí Ẩn Của Sự Sống</h3>
      </div>
      <div class="product">
        <img src="img/phuongdong.jpg" alt="Hành Trình Về Phương Đông">
        <h3>Hành Trình Về Phương Đông</h3>
      </div>
      <div class="product">
        <img src="img/duongxua.jpg" alt="Đường Xưa Mây Trắng">
        <h3>Đường Xưa Mây Trắng</h3>
      </div>
      <div class="product">
        <img src="img/chiến thắng.jpg" alt="Chiến Thắng Con Quỷ Trong Bạn">
        <h3>Chiến Thắng Con Quỷ Trong Bạn</h3>
      </div>
      <div class="product">
        <img src="img/trietgia.jpg" alt="Tư Duy Như Một Triết Gia">
        <h3>Tư Duy Như Một Triết Gia</h3>
      </div>
    </div>
  </section>
</body>
</html>
