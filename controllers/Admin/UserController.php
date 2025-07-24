<?php
require_once 'models/UserModel.php';

class UserController
{
    // Danh sách user
    public function index()
    {
        $users = User::all();
        include 'views/users/index.php';
    }

    // Trang tạo user mới
    public function create()
    {
        include 'views/users/create.php';
    }

    // Lưu user mới vào DB
    public function store()
    {
        $data = [
            'name'     => $_POST['name'] ?? '',
            'email'    => $_POST['email'] ?? '',
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'phone'    => $_POST['phone'] ?? null,
            'gender'   => $_POST['gender'] ?? 'Khác',
            'birthday' => $_POST['birthday'] ?? null,
            'avatar'   => $_POST['avatar'] ?? null,
            'role'     => $_POST['role'] ?? 'user',
            'isActive' => $_POST['isActive'] ?? 1
        ];

        if (User::create($data)) {
            header('Location: index.php?controller=user&action=index');
            exit;
        } else {
            echo "Thêm người dùng thất bại!";
        }
    }

    // Trang chỉnh sửa user
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "ID không hợp lệ.";
            return;
        }

        $user = User::find($id);
        if (!$user) {
            echo "Không tìm thấy người dùng.";
            return;
        }

        include 'views/users/edit.php';
    }

    // Cập nhật thông tin user
    public function update()
    {
        $id = $_POST['id'] ?? null;
        if (!$id) {
            echo "ID không hợp lệ.";
            return;
        }

        $data = [
            'name'     => $_POST['name'],
            'email'    => $_POST['email'],
            'password' => $_POST['password'], // Có thể cần hash lại nếu có thay đổi
            'phone'    => $_POST['phone'],
            'gender'   => $_POST['gender'],
            'birthday' => $_POST['birthday'],
            'avatar'   => $_POST['avatar'],
            'role'     => $_POST['role'],
            'isActive' => $_POST['isActive']
        ];

        if (User::update($id, $data)) {
            header('Location: index.php?controller=user&action=index');
            exit;
        } else {
            echo "Cập nhật người dùng thất bại!";
        }
    }

    // Xoá user
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id && User::delete($id)) {
            header('Location: index.php?controller=user&action=index');
            exit;
        } else {
            echo "Xoá thất bại!";
        }
    }

    // Bật / Tắt user
    public function toggle()
    {
        $id = $_GET['id'] ?? null;
        $status = $_GET['status'] ?? null;

        if ($id !== null && $status !== null) {
            User::toggle($id, $status);
        }
        header('Location: index.php?controller=user&action=index');
        exit;
    }
}
