<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quản lý sách</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f8f9fa;
    }

    .container {
      background-color: #ffffff;
      border-radius: 8px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    h2 {
      text-align: center;
      color: #2c3e50;
    }

    .btn-primary {
      background-color: #4ba3c7;
      border: none;
    }

    .btn-primary:hover {
      background-color: #3a92b0;
    }

    .table thead th {
      background-color: #2c3e50;
      color: white;
    }

    .btn-warning {
      color: white;
    }

    img.thumbnail {
      width: 60px;
      height: auto;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4">Quản lý sách</h2>

    <div class="d-flex justify-content-start mb-3">
      <a href="index.php?act=book/create" class="btn btn-primary">+ Thêm sách</a>
    </div>

    <table class="table table-bordered table-striped align-middle text-center">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tiêu đề</th>
          <th>Ảnh</th>
          <th>Giá gốc</th>
          <th>Giá bán</th>
          <th>Tác giả</th>
          <th>Thể loại</th>
          <th>Số lượng</th>
          <th>Đã bán</th>
          <th>Trạng thái</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($books as $b): ?>
          <tr>
            <td><?= $b['id'] ?></td>
            <td><?= htmlspecialchars($b['title']) ?></td>
            <td>
              <?php if (!empty($b['image']) && file_exists($b['image'])): ?>
                <img src="<?= $b['image'] ?>" class="thumbnail" alt="Ảnh bìa">
              <?php else: ?>
                <span class="text-muted">Không có ảnh</span>
              <?php endif; ?>
            </td>
            <td>
              <?= $b['oldPrice'] > 0 ? number_format($b['oldPrice']) . 'đ' : '-' ?>
            </td>
            <td>
              <strong><?= number_format($b['price']) ?>đ</strong>
            </td>
            <td><?= htmlspecialchars($b['author']) ?></td>
            <td><?= htmlspecialchars($b['category_name']) ?></td>
            <td><?= $b['quantity'] ?></td>
            <td><?= $b['sold'] ?></td>
            <td>
              <span class="badge <?= $b['isActive'] ? 'bg-success' : 'bg-secondary' ?>">
                <?= $b['isActive'] ? 'Hiện' : 'Ẩn' ?>
              </span>
            </td>
            <td>
              <a href="index.php?act=book/edit&id=<?= $b['id'] ?>" class="btn btn-sm btn-warning">Sửa</a>
              <a href="index.php?act=book/delete&id=<?= $b['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xoá?')">Xoá</a>
              <a href="index.php?act=book/toggle&id=<?= $b['id'] ?>" class="btn btn-sm btn-info">
                <?= $b['isActive'] ? 'Ẩn' : 'Hiện' ?>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
