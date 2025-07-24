<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Thêm danh mục</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <div class="mt-5 px-4">
    <h3 class="text-center mb-4">Thêm danh mục sách</h3>

    <form action="index.php?act=category/store" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="name" class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" id="name" name="name" required />
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Mô tả</label>
        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Ảnh</label>
        <input type="file" class="form-control" id="image" name="image" />
      </div>

      <div class="mb-3">
        <label class="form-label">Trạng thái</label>
        <select class="form-select" name="isActive">
          <option value="1" selected>Hiện</option>
          <option value="0">Ẩn</option>
        </select>
      </div>

      <div class="d-flex justify-content-between">
        <a href="index.php?controller=category" class="btn btn-secondary">Quay lại</a>
        <button type="submit" class="btn btn-success">Thêm mới</button>
      </div>
    </form>
  </div>
</body>

</html>
