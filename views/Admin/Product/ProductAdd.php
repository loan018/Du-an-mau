<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Thêm sách</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <div class="mt-5 px-4">
    <h3 class="text-center mb-4">Thêm sách mới</h3>

    <form action="index.php?act=book/store" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="title" class="form-label">Tên sách</label>
        <input type="text" class="form-control" id="title" name="title" required />
      </div>

      <div class="mb-3">
        <label for="author" class="form-label">Tác giả</label>
        <input type="text" class="form-control" id="author" name="author" required />
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Ảnh</label>
        <input type="file" class="form-control" id="image" name="image" />
      </div>

      <div class="mb-3">
        <label for="oldPrice" class="form-label">Giá gốc</label>
        <input type="number" class="form-control" id="oldPrice" name="oldPrice" step="0.01" />
      </div>

      <div class="mb-3">
        <label for="price" class="form-label">Giá bán</label>
        <input type="number" class="form-control" id="price" name="price" step="0.01" required />
      </div>

      <div class="mb-3">
        <label for="quantity" class="form-label">Số lượng</label>
        <input type="number" class="form-control" id="quantity" name="quantity" required />
      </div>

      <div class="mb-3">
        <label for="category_id" class="form-label">Danh mục</label>
        <select class="form-select" name="category_id" required>
          <option value="">-- Chọn danh mục --</option>
          <?php foreach ($categories as $category) : ?>
            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Mô tả</label>
        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Trạng thái</label>
        <select class="form-select" name="isActive">
          <option value="1" selected>Hiện</option>
          <option value="0">Ẩn</option>
        </select>
      </div>

      <div class="d-flex justify-content-between">
        <a href="index.php?act=book" class="btn btn-secondary">Quay lại</a>
        <button type="submit" class="btn btn-success">Thêm sách</button>
      </div>
    </form>
  </div>
</body>

</html>
