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

     <form method="post">
        <label>Name:</label><br>
        <input type="text" name="nama" required><br><br>
        <label>No WA:</label><br>
        <input type="text" name="nomor_wa"><br><br>
        <label>Telegram ID:</label><br>
        <input type="text" name="telegram_id"><br><br>
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <label>Divisi:</label><br>
        <input type="number" name="divisi"><br><br>
        <label>Store:</label><br>
        <input type="number" name="store"><br><br>
        <label>Status:</label><br>
        <input type="number" name="status"><br><br>
        <label>Tanggal:</label><br>
        <input type="date" name="tanggal"><br><br>
        <label>Visible:</label><br>
        <input type="number" name="visible"><br><br>
        <br>
        <input type="submit" name="submit" value="Daftar akun">
    </form>

    <p style="text-align:center;">Sudah punya akun? <a href="login.php">Login</a></p>

</body>
</html>
