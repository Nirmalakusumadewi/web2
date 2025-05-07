<?php
require_once './models/UserModel.php';
require_once './config/database.php';

class UserController
{
    private $model;

    public function __construct()
    {
        $this->startSession(); // Mulai session
    }

    private function startSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    private function checkLogin()
    {
        if (empty($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
    }

    // Menampilkan daftar user
    public function index()
    {
        $this->checkLogin();
        $users = $this->model->getAll();
        include './views/user_list.php';
    }

    // Menampilkan form tambah user
    public function add()
    {
        $this->checkLogin();
        include './views/user_form.php';
    }

    // Menyimpan user baru
    public function save()
    {
        $this->checkLogin();

        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $this->model->add($name, $email, $password);
            header("Location: index.php?action=user_index");
            exit;
        } else {
            echo "Input tidak valid.";
        }
    }

    // Menghapus user
    public function delete()
    {
        $this->checkLogin();

        if (isset($_GET['id'])) {
            $this->model->delete($_GET['id']);
            header("Location: index.php?action=user_index");
            exit;
        } else {
            echo "ID user tidak ditemukan.";
        }
    }

    // Menampilkan form edit user
    public function edit($id)
    {
        $this->checkLogin();

        // Ambil data user berdasarkan ID
        $user = $this->model->getUserById($id);

        if ($user) {
            // Jika data user ditemukan, tampilkan form edit
            include './views/user_form.php';
        } else {
            echo "User tidak ditemukan!";
        }
    }

    // Update data user
    public function update($id)
    {
        $this->checkLogin();

        if (!empty($_POST['name']) && !empty($_POST['email'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;

            $this->model->update($id, $name, $email, $password);
            header("Location: index.php?action=user_index");
            exit;
        } else {
            echo "Input tidak valid.";
        }
    }

    // Login
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->model->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                header('Location: index.php?action=user_index');
                exit;
            } else {
                $error = 'Email atau password salah';
                include './views/login.php';
            }
        } else {
            include './views/login.php';
        }
    }

    // Logout
    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: index.php?action=login');
        exit;
    }
}
?>