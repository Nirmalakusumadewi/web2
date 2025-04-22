<?php
require_once 'controllers/ProductController.php';
require_once 'controllers/UserController.php';

$productController = new ProductController();
$userController = new UserController();

$action = isset($_GET['action']) ? $_GET['action'] : 'home';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($action) {
    // Halaman utama
    case 'home':
        include 'views/home.php';
        break;

    // Routing untuk produk
    case 'index':
        $productController->index();
        break;
    case 'create':
        $productController->create();
        break;
    case 'store':
        $productController->store();
        break;
    case 'edit':
        $productController->edit($id);
        break;
    case 'update':
        $productController->update($id);
        break;
    case 'delete':
        $productController->delete($id);
        break;

    // Routing untuk user
    case 'user_index':
        $userController->index();
        break;
    case 'user_add':
        $userController->add();
        break;
    case 'user_save':
        $userController->save();
        break;
    case 'user_delete':
        $userController->delete();
        break;
    case 'user_edit':
        $userController->edit($id); // Routing untuk edit user
        break;
    case 'user_update':
        $userController->update($id); // Routing untuk update user
        break;

    // Routing untuk login dan logout
    case 'login':
        $userController->login();
        break;
    case 'logout':
        $userController->logout();
        break;

    // Default: tampilkan halaman utama
    default:
        include 'views/home.php';
        break;
}
?>