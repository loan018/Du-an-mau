<?php
require_once 'models/ProductModel.php';
require_once 'models/CategoryModel.php';

class BookController
{
    public function list()
    {
        $books = Book::all();
        $i = 1;
        $view = 'views/Admin/Product/Product.php';
        include 'views/Admin/Layout/Main.php';
    }

    public function create()
    {
        $categories = Category::all();
        $view = 'views/Admin/Product/ProductAdd.php';
        include 'views/Admin/Layout/Main.php';
    }

    public function store()
    {
        $image = '';
        if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/books/';
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
            'title' => $_POST['title'],
            'image' => $image,
            'oldPrice' => $_POST['oldPrice'] ?? 0,
            'price' => $_POST['price'],
            'category_id' => $_POST['category_id'],
            'author' => $_POST['author'],
            'description' => $_POST['description'] ?? '',
            'quantity' => $_POST['quantity'],
            'isActive' => isset($_POST['isActive']) ? 1 : 0
        ];

        if (Book::create($data)) {
            header('Location: index.php?act=book');
        } else {
            echo "❌ Thêm sách thất bại!";
        }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $book = Book::find($id);
        $categories = Category::all();

        if (!$book) {
            echo "Không tìm thấy sách!";
            return;
        }

        $view = 'views/Admin/Product/ProductEdit.php';
        include 'views/Admin/Layout/Main.php';
    }

    public function update()
    {
        $id = $_GET['id'];
        $book = Book::find($id);
        if (!$book) {
            echo "Không tìm thấy sách!";
            return;
        }

        $imagePath = $_POST['image_old'];

        if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/books/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = time() . '_' . basename($_FILES['image']['name']);
            $targetFile = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                if (!empty($book['image']) && file_exists($book['image'])) {
                    unlink($book['image']);
                }

                $imagePath = $targetFile;
            }
        }

        $data = [
            'title' => $_POST['title'],
            'image' => $imagePath,
            'oldPrice' => $_POST['oldPrice'],
            'price' => $_POST['price'],
            'category_id' => $_POST['category_id'],
            'author' => $_POST['author'],
            'description' => $_POST['description'],
            'quantity' => $_POST['quantity'],
            'isActive' => isset($_POST['isActive']) ? 1 : 0
        ];

        if (Book::update($id, $data)) {
            header('Location: index.php?act=book');
        } else {
            echo "❌ Cập nhật sách thất bại!";
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        $book = Book::find($id);
        if ($book) {
            if (!empty($book['image']) && file_exists($book['image'])) {
                unlink($book['image']);
            }
            if (Book::delete($id)) {
                header('Location: index.php?act=book');
                return;
            }
        }
        echo "❌ Xoá sách thất bại!";
    }

    public function toggle()
    {
        $id = $_GET['id'];
        $book = Book::find($id);
        if ($book) {
            $newStatus = $book['isActive'] ? 0 : 1;
            Book::toggle($id, $newStatus);
        }
        header('Location: index.php?act=book');
    }
}
