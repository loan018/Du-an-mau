<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa sách</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h3 class="text-center mb-4">Chỉnh sửa sách</h3>

    <form action="index.php?act=book/update&id=<?= $book['id'] ?>" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="title" class="form-label">Tên sách</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($book['title']) ?>" required>
      </div>

      <div class="mb-3">
        <label for="author" class="form-label">Tác giả</label>
        <input type="text" class="form-control" id="author" name="author" value="<?= htmlspecialchars($book['author']) ?>" required>
      </div>

      <div class="mb-3">
        <label for="price" class="form-label">Giá</label>
        <input type="number" class="form-control" id="price" name="price" value="<?= $book['price'] ?>" required>
      </div>

      <div class="mb-3">
        <label for="oldPrice" class="form-label">Giá gốc (nếu có)</label>
        <input type="number" class="form-control" id="oldPrice" name="oldPrice" value="<?= $book['oldPrice'] ?>">
      </div>

      <div class="mb-3">
        <label for="quantity" class="form-label">Số lượng</label>
        <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $book['quantity'] ?>" required>
      </div>

      <div class="mb-3">
        <label for="category_id" class="form-label">Danh mục</label>
        <select class="form-select" name="category_id" id="category_id" required>
          <?php foreach ($categories as $cate): ?>
            <option value="<?= $cate['id'] ?>" <?= $cate['id'] == $book['category_id'] ? 'selected' : '' ?>>
              <?= htmlspecialchars($cate['name']) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Mô tả</label>
        <textarea class="form-control" name="description" id="description" rows="4"><?= htmlspecialchars($book['description']) ?></textarea>
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Ảnh hiện tại</label><br>
        <?php if (!empty($book['image'])): ?>
          <img src="uploads/<?= $book['image'] ?>" alt="Ảnh sách" width="120" class="mb-2">
        <?php endif; ?>
        <input type="file" class="form-control" id="image" name="image">
      </div>

      <div class="mb-3">
        <label for="isActive" class="form-label">Trạng thái</label>
        <select class="form-select" name="isActive" id="isActive">
          <option value="1" <?= $book['isActive'] ? 'selected' : '' ?>>Hiện</option>
          <option value="0" <?= !$book['isActive'] ? 'selected' : '' ?>>Ẩn</option>
        </select>
      </div>

      <div class="d-flex justify-content-between">
        <a href="index.php?act=book" class="btn btn-secondary">Quay lại</a>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
      </div>
    </form>
  </div>
</body>
</html>
