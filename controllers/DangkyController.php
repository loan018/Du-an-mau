<?php
require_once 'models/UserModel.php';

class RegisterController
{
    // Hiển thị form đăng ký
    public function registerForm()
    {
        include 'views/Đangky.php';
    }

    // Xử lý đăng ký
    public function register()
    {
        $name     = $_POST['name'] ?? '';
        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $phone    = $_POST['phone'] ?? null;

        // Kiểm tra trùng email
        $existingUser = $this->findByEmail($email);
        if ($existingUser) {
            echo "❌ Email đã được sử dụng.";
            return;
        }

        // Tạo user mới
        $data = [
            'name'     => $name,
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'phone'    => $phone,
            'gender'   => 'Khác',
            'role'     => 'user',
            'isActive' => 1
        ];

        if (User::create($data)) {
            echo "✅ Đăng ký thành công!";
            header('Location: index.php?act=login');
            exit;
        } else {
            echo "❌ Đăng ký thất bại!";
        }
    }

    // Hàm phụ: tìm user theo email
    private function findByEmail($email)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
