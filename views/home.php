<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard MVC PHP</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .menu {
            margin-top: 20px;
        }

        .menu a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #3498db;
            color: white;
            border-radius: 5px;
        }

        .menu a:hover {
            background-color: #2980b9;
        }

        .logout {
            margin-top: 30px;
        }

        .logout a {
            color: #e74c3c;
            text-decoration: none;
        }

        .logout a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <p>Selamat datang, <?= $_SESSION['user_email'] ?? 'Tamu'; ?>!</p>

    <h1>MVC Pemrograman PHP</h1>
    <p>Silakan pilih menu di bawah ini:</p>

    <div class="menu">
        <a href="index.php?action=index">Manajemen Produk</a>
        <a href="index.php?action=user_index">Manajemen User</a>
    </div>

    <div class="logout">
        <a href="index.php?action=logout">Logout</a>
    </div>
</body>

</html>