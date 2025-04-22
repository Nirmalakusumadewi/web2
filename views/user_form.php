<!DOCTYPE html>
<html>

<head>
    <title>Form User</title>
</head>

<body>
    <h1><?= isset($user) ? 'Edit' : 'Tambah' ?> User</h1>
    <form method="POST" action="index.php?action=<?= isset($user) ? 'user_update&id=' . $user['id'] : 'user_save' ?>">
        <!-- Input Nama -->
        <label>Nama:</label>
        <input type="text" name="name" value="<?= isset($user) ? $user['name'] : '' ?>" required>

        <!-- Input Email -->
        <label>Email:</label>
        <input type="email" name="email" value="<?= isset($user) ? $user['email'] : '' ?>" required>

        <!-- Kondisi untuk password -->
        <?php if (isset($user)): ?>
            <label>Password:</label>
            <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password">
        <?php else: ?>
            <label>Password:</label>
            <input type="password" name="password" required>
        <?php endif; ?>

        <!-- Tombol Simpan -->
        <button type="submit"><?= isset($user) ? 'Update' : 'Simpan' ?></button>
    </form>

    <!-- Tautan kembali ke daftar user -->
    <a href="index.php?action=user_index">Kembali</a>
</body>

</html>