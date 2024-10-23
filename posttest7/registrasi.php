<?php
require "koneksi.php";

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = $_POST["role"];

    $checkQuery = "SELECT * FROM users WHERE username = '$username'";
    $checkResult = mysqli_query($conn, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {

        echo "
<script>
alert('Username sudah digunakan! Silakan gunakan username lain.');
document.location.href = 'registrasi.php';
</script>
";
    } else {

        $query = "INSERT INTO users (username, password, role) VALUES ('$username',
'$password', '$role')";
        if (mysqli_query($conn, $query)) {
            echo "
<script>
alert('Registrasi berhasil!');
document.location.href = 'login.php';
</script>
";
        } else {
            echo "
<script>
alert('Registrasi gagal!');
document.location.href = 'index.php';
</script>
";
        }
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
    <title>Registrasi</title>
</head>

<body>
    <section class="login-card">
        <hgroup>
            <h1 class="login-title">Register</h1>
            <p class="login-description">Silakan register disini</p>
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

            <div class="login-form-group">
                <label for="role" class="login-form-title">Role</label>
                <select name="role" id="role" class="login-form-input" required>
                    <option name="role" value="Admin">Admin</option>
                    <option name="role" value="User">User</option>
                </select>
            </div>

            <button type="submit" name="submit" class="login-button">LOGIN</button>
        </form>
    </section>

    <script src="/scripts/script.js"></script>
</body>

</html>