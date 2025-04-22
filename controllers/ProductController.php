<?php
require_once __DIR__ . '/../models/ProductModel.php';
require_once __DIR__ . '/../config/database.php'; // pastikan koneksi database di-load

class ProductController
{
    private $model;

    public function __construct()
    {
        // Ambil koneksi PDO dari Database
        $pdo = Database::getInstance()->getConnection();
        // Kirim koneksi PDO ke konstruktor ProductModel
        $this->model = new ProductModel($pdo);
    }

    public function index()
    {
        $products = $this->model->getAllProducts();
        include __DIR__ . '/../views/product_list.php';
    }

    public function create()
    {
        include __DIR__ . '/../views/product_form.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];

            $this->model->addProduct($name, $price);
            header("Location: index.php?action=index");
            exit;
        }
    }

    public function edit($id)
    {
        $product = $this->model->getProductById($id);
        include __DIR__ . '/../views/product_form.php';
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];

            $this->model->updateProduct($id, $name, $price);
            header("Location: index.php?action=index");
            exit;
        }
    }

    public function delete($id)
    {
        $this->model->deleteProduct($id);
        header("Location: index.php?action=index");
        exit;
    }
}
?>