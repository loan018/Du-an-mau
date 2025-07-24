<?php
require_once 'commons/env.php'; // Kết nối PDO

class Book {
    // Lấy tất cả sách
    public static function all() {
        global $pdo;
        $stmt = $pdo->query("SELECT books.*, categories.name AS category_name FROM books 
                             JOIN categories ON books.category_id = categories.id 
                             ORDER BY books.id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tìm sách theo ID
    public static function find($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm sách mới
    public static function create($data) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO books 
            (title, image, oldPrice, price, category_id, author, description, quantity, sold, isActive) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['title'],
            $data['image'],
            $data['oldPrice'],
            $data['price'],
            $data['category_id'],
            $data['author'],
            $data['description'],
            $data['quantity'],
            $data['sold'],
            $data['isActive']
        ]);
    }

    // Cập nhật sách
    public static function update($id, $data) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE books SET 
            title = ?, image = ?, oldPrice = ?, price = ?, category_id = ?, author = ?, 
            description = ?, quantity = ?, sold = ?, isActive = ?
            WHERE id = ?");
        return $stmt->execute([
            $data['title'],
            $data['image'],
            $data['oldPrice'],
            $data['price'],
            $data['category_id'],
            $data['author'],
            $data['description'],
            $data['quantity'],
            $data['sold'],
            $data['isActive'],
            $id
        ]);
    }

    // Xoá sách
    public static function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM books WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Bật/tắt trạng thái sách
    public static function toggle($id, $status) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE books SET isActive = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }
}
