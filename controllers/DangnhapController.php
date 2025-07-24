<?php
require_once 'models/UserModel.php';

class LoginController
{
    // Hiển thị form đăng nhập
    public function loginForm()
    {
        include 'views/Đangnhap.php';
    }

    // Xử lý đăng nhập
    public function login()
    {
        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->findByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            echo "❌ Email hoặc mật khẩu không đúng.";
            return;
        }

        // Lưu thông tin người dùng vào session
        $_SESSION['user'] = [
            'id'    => $user['id'],
            'email' => $user['email'],
            'role'  => $user['role'],
        ];

        echo "✅ Đăng nhập thành công!";
        header('Location: index.php?act=/');
        exit;
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
