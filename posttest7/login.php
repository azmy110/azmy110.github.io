<?php
session_start();
require "koneksi.php";

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query untuk mendapatkan data user berdasarkan username
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Cek apakah username ditemukan
    if (mysqli_num_rows($result) === 1) {
        // Ambil data pengguna
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Cek role pengguna
            $_SESSION['login'] = true; //tambahkan session jika berhasil login
            if ($user['role'] === 'Admin') {
                $_SESSION['role'] = 'admin'; //session untuk admin
                echo "
        <script>
        alert('Login berhasil! Selamat datang Admin.');
        document.location.href = 'index.php';
        </script>
        ";
            } else {
                $_SESSION['role'] = 'user'; //session untuk user
                echo "
        <script>
        alert('Login berhasil! Selamat datang User.');
        document.location.href = 'index.php';
        </script>
        ";
            }
        } else {
            echo "
        <script>
        alert('Password salah!');
        </script>
        ";
        }
    } else {
        echo "
        <script>
        alert('Username tidak ditemukan!');
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="login.css">

    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>

<body>
    <section class="login-card">
        <hgroup>
            <h1 class="login-title">Login</h1>
            <p class="login-description">Silakan login untuk melihat data review</p>
        </hgroup>

        <form action="" method="post" class="login-form-container">
            <div class="login-form-group">
                <label for="username" class="login-form-title">Username</label>
                <input type="text" placeholder="Username" name="username" id="username" class="login-form-input" />
            </div>

            <div class="login-form-group">
                <label for="password" class="login-form-title">Password</label>
                <input type="password" placeholder="Password" name="password" id="password" class="login-form-input" />
            </div>

            <button type="submit" name="submit" class="login-button">LOGIN</button>
        </form>
    </section>

    <script src="/scripts/script.js"></script>
</body>

</html>