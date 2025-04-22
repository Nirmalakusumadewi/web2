<?php
class Database
{
    private static $instance = null;
    private $conn;
    private $host = "127.0.0.1"; // atau localhost
    private $user = "root";
    private $pass = "";
    private $dbname = "mvcphp";
    private $port = "3306";

    private function __construct()
    {
        try {
            $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->user, $this->pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
            // echo "Database connected successfully"; // Untuk debugging saja
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
?>