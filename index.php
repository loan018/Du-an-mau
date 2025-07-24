<?php 
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/DangkyController.php'; // Đăng ký
require_once './controllers/DangnhapController.php'; // Đăng nhập

 require_once './controllers/Client/HomeController.php';
//Admin
require_once './controllers/Admin/CategoryController.php';
require_once './controllers/Admin/ProductController.php';
require_once './controllers/Admin/UserController.php';


// Require toàn bộ file Models
//Admin
require_once './models/CategoryModel.php';
require_once './models/ProductModel.php';
 require_once './models/HomeModel.php';
require_once './models/UserModel.php'; 

// Route
$act = $_GET['act'] ?? '/';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Auth
    'register' => (new RegisterController())->registerForm(),
    'login' => (new LoginController())->loginForm(),
    '/' => (new HomeController())->Home(),
    
    // Category Admin
    'category' => (new CategoryController())->List(),
    'category/create' => (new CategoryController())->Create(),
    'category/store' => (new CategoryController())->Store(),
    'category/edit' => (new CategoryController())->Edit(),
    'category/update' => (new CategoryController())->Update(),
    'category/delete' => (new CategoryController())->Delete(),
    'category/toggle' => (new CategoryController())->Toggle(),
    // Product Admin
    'book' => (new BookController())->List(),
    'book/create' => (new BookController())->Create(),
    'book/store' => (new BookController())->Store(),
    'book/edit' => (new BookController())->Edit(),
    'book/update' => (new BookController())->Update(),
    'book/delete' => (new BookController())->Delete(),
};
