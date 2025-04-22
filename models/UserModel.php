<?php
class UserModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Mendapatkan semua data user
    public function getAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Menambahkan user baru ke database dengan password yang di-hash
    public function add($name, $email, $password)
    {
        // Hash password sebelum disimpan
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $hashedPassword]);
    }

    // Menghapus user berdasarkan id
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
    }

    // Mendapatkan user berdasarkan email untuk login
    public function getUserByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mendapatkan user berdasarkan ID
    public function getUserById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Memperbarui data user
    public function update($id, $name, $email, $password = null)
    {
        $sql = "UPDATE users SET name = ?, email = ?";

        // Jika password diubah, tambahkan ke query
        if ($password) {
            $sql .= ", password = ?";
        }

        $sql .= " WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);

        if ($password) {
            $stmt->execute([$name, $email, $password, $id]);
        } else {
            $stmt->execute([$name, $email, $id]);
        }
    }

    // Verifikasi password saat login
    public function verifyPassword($inputPassword, $storedPassword)
    {
        return password_verify($inputPassword, $storedPassword);
    }
}
?>