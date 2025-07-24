<?php
require_once 'commons/env.php'; // kết nối $pdo

class User {
    // Lấy tất cả user
    public static function all() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM users ORDER BY name ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tìm user theo ID
    public static function find($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tìm user theo email
    public static function findByEmail($email) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm user mới
    public static function create($data) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, phone, gender, birthday, avatar, role, isActive)
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['name'],
            $data['email'],
            $data['password'],
            $data['phone'] ?? null,
            $data['gender'] ?? 'Khác',
            $data['birthday'] ?? null,
            $data['avatar'] ?? null,
            $data['role'] ?? 'user',
            $data['isActive'] ?? 1
        ]);
    }

    // Cập nhật user
    public static function update($id, $data) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE users SET name=?, email=?, password=?, phone=?, gender=?, birthday=?, avatar=?, role=?, isActive=? WHERE id=?");
        return $stmt->execute([
            $data['name'],
            $data['email'],
            $data['password'],
            $data['phone'],
            $data['gender'],
            $data['birthday'],
            $data['avatar'],
            $data['role'],
            $data['isActive'],
            $id
        ]);
    }

    // Xoá user
    public static function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Bật/tắt trạng thái user
    public static function toggle($id, $status) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE users SET isActive = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }
}
