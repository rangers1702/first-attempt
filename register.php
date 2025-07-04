<?php
require 'koneksi.php';

$message = '';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash password
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah username sudah ada
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($cek) > 0) {
        $message = "Username sudah digunakan!";
    } else {
        $insert = mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$hashed')");
        if ($insert) {
            header("Location: login.php");
            exit;
        } else {
            $message = "Registrasi gagal!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        form { max-width: 300px; margin: 100px auto; }
        input, button { width: 100%; margin-bottom: 10px; padding: 8px; }
        .error { color: red; text-align: center; }
    </style>
</head>
<body>

    <h2 style="text-align:center;">Form Register</h2>

    <?php if ($message): ?>
        <p class="error"><?= $message; ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="submit">Daftar</button>
    </form>

    <p style="text-align:center;">Sudah punya akun? <a href="login.php">Login</a></p>

</body>
</html>
