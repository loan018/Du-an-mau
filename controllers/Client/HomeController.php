<?php
class HomeController
{
    private $modelProduct;

    public function __construct()
    {
        $this->modelProduct = new ProductModel();
    }

    public function Home()
    {
        $title = "Trang chủ";
        $thoiTiet = "Hôm nay trời có vẻ là mưa";
        $view = './views/Client/trangchu.php';
        require_once './views/Client/Layout/Main.php';
    }
}
