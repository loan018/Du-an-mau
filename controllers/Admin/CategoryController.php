<?php
require_once 'models/CategoryModel.php';

class CategoryController
{

    // Hiển thị danh sách danh mục
    public function List()
    {
        $categories = Category::all();
        $i = 1; // Biến đếm để đánh số thứ tự
        $view = 'views/Admin/Category/Category.php';
        include 'views/Admin/Layout/Main.php';
    }

    // Hiển thị form thêm mới
    public function create()
    {
        $view = 'views/Admin/Category/CategoryAdd.php';
        include 'views/Admin/Layout/Main.php';
    }

    // Lưu danh mục mới
    public function store()
    {
        $image = '';
        if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/category/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $fileName = time() . '_' . basename($_FILES['image']['name']);
            $targetFile = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $image = $targetFile;
            }
        }

        $data = [
            'name' => $_POST['name'],
            'description' => $_POST['description'] ?? '',
            'image' => $image,
            'isActive' => isset($_POST['isActive']) ? 1 : 0
        ];

        if (Category::create($data)) {
            echo "✅ Thêm danh mục thành công!";
            header('Location: index.php?act=category');
            exit;
        } else {
            echo "❌ Thêm danh mục thất bại!";
        }
    }

    // Hiển thị form chỉnh sửa
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "Thiếu ID danh mục!";
            return;
        }

        $category = Category::find($id);
        if (!$category) {
            echo "Danh mục không tồn tại!";
            return;
        }

        $view = 'views/Admin/Category/CategoryEdit.php';
        include 'views/Admin/Layout/Main.php';

    }

    // Cập nhật danh mục
    public function update()
    {
        $id = $_POST['id'];
        $category = Category::find($id);

        // Nếu không tìm thấy
        if (!$category) {
            echo "Không tìm thấy danh mục để cập nhật!";
            return;
        }

        $imagePath = $_POST['image_old'];

        // Nếu có upload ảnh mới
        if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $targetDir = 'uploads/category/';
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            $fileName = time() . '_' . basename($_FILES['image']['name']);
            $targetFile = $targetDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                // Xoá ảnh cũ nếu có
                if (!empty($category['image']) && file_exists($category['image'])) {
                    unlink($category['image']);
                }

                $imagePath = $targetFile;
            }
        }

        $data = [
            'name' => $_POST['name'],
            'description' => $_POST['description'] ?? '',
            'image' => $imagePath,
            'isActive' => isset($_POST['isActive']) ? 1 : 0
        ];

        if (Category::update($id, $data)) {
            echo "✅ Cập nhật danh mục thành công!";
            header('Location: index.php?act=category');
        } else {
            echo "❌ Cập nhật danh mục thất bại!";
        }
    }

    // Xoá danh mục
    public function delete()
    {
        $id = $_GET['id'];
        $category = Category::find($id);

        if ($category) {
            if (!empty($category['image']) && file_exists($category['image'])) {
                unlink($category['image']);
            }

            if (Category::delete($id)) {
                header('Location: index.php?act=category');
                return;
            }
        }

        echo "❌ Xóa danh mục thất bại!";
    }

    // Bật / Tắt trạng thái
    public function toggle()
    {
        $id = $_GET['id'];
        $category = Category::find($id);

        if ($category) {
            $newStatus = $category['isActive'] == 1 ? 0 : 1;
            Category::toggle($id, $newStatus);
        }

        header('Location: index.php?act=category');
    }
}
