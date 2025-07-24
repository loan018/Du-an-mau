<?php
require_once 'commons/env.php'; // Kết nối PDO

class Category {
    // Lấy tất cả danh mục (nếu bạn muốn sắp theo tên thay vì sortOrder)
    public static function all() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM categories ORDER BY name ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy danh mục theo ID
    public static function find($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm mới danh mục
    public static function create($data) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO categories (name, description, image, isActive) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $data['name'],
            $data['description'],
            $data['image'],
            $data['isActive']
        ]);
    }

    // Cập nhật danh mục
    public static function update($id, $data) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE categories SET name = ?, description = ?, image = ?, isActive = ? WHERE id = ?");
        return $stmt->execute([
            $data['name'],
            $data['description'],
            $data['image'],
            $data['isActive'],
            $id
        ]);
    }

    // Xoá danh mục
    public static function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM categories WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Bật/tắt trạng thái danh mục
    public static function toggle($id, $status) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE categories SET isActive = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }
}
