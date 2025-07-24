<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quản lý danh mục sách</title>
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
      background-color: #c7a96dff;
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
    <h2 class="mb-4">Quản lý danh mục</h2>

    <div class="d-flex justify-content-start mb-3">
      <a href="index.php?act=category/create" class="btn btn-primary">+ Thêm danh mục</a>
    </div>

    <table class="table table-bordered table-striped align-middle text-center">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên</th>
          <th>Mô tả</th>
          <th>Ảnh</th>
          <th>Trạng thái</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($categories as $c): ?>
          <tr>
            <td><?= $i++ ?></td>
            <td><?= htmlspecialchars($c['name']) ?></td>
            <td><?= htmlspecialchars($c['description']) ?></td>
            <td>
              <?php if (!empty($c['image']) && file_exists($c['image'])): ?>
                <img src="<?= $c['image'] ?>" class="thumbnail" alt="Ảnh">
              <?php else: ?>
                <span class="text-muted">Không có ảnh</span>
              <?php endif; ?>
            </td>
            <td>
              <span class="badge <?= $c['isActive'] ? 'bg-success' : 'bg-secondary' ?>">
                <?= $c['isActive'] ? 'Hiện' : 'Ẩn' ?>
              </span>
            </td>
            <td>
              <a href="index.php?act=category/edit&id=<?= $c['id'] ?>" class="btn btn-sm btn-warning">
                Sửa
              </a>

              <a href="index.php?act=category/delete&id=<?= $c['id'] ?>" class="btn btn-sm btn-danger"
                onclick="return confirm('Bạn có chắc chắn muốn xoá?')">
                Xoá
              </a>

              <a href="index.php?act=category/toggle&id=<?= $c['id'] ?>" class="btn btn-sm btn-info">
                <?= $c['isActive'] ? 'Ẩn' : 'Hiện' ?>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
