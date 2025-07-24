<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sửa danh mục</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <div class="container mt-5">
    <h2 class="mb-4 text-center">Chỉnh sửa danh mục</h2>
    <form action="index.php?act=category/update" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $category['id'] ?>">

      <div class="mb-3">
        <label class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($category['name']) ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea class="form-control" name="description"
          rows="4"><?= htmlspecialchars($category['description']) ?></textarea>
      </div>
      <input type="hidden" name="image_old" value="<?= $category['image'] ?>">

      <div class="mb-3">
        <label class="form-label">Ảnh</label><br>
        <img src="<?= $category['image'] ?>" width="100" class="mb-2" alt="Ảnh">
        <input type="file" class="form-control" name="image">
      </div>

      <div class="mb-3">
        <label class="form-label">Trạng thái</label>
        <select class="form-select" name="isActive">
          <option value="1" <?= $category['isActive'] ? 'selected' : '' ?>>Hiện</option>
          <option value="0" <?= !$category['isActive'] ? 'selected' : '' ?>>Ẩn</option>
        </select>
      </div>

      <button type="submit" class="btn btn-success">Cập nhật</button>
      <a href="index.php?act=category" class="btn btn-secondary">Quay lại</a>
    </form>
  </div>
</body>

</html>