<?php
// add_user.php

// Include database connection
include('koneksi.php');

// Cek apakah form disubmit
if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $nomor_wa = mysqli_real_escape_string($conn, $_POST['nomor_wa']);
    $telegram_id = mysqli_real_escape_string($conn, $_POST['telegram_id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $divisi = mysqli_real_escape_string($conn, $_POST['divisi']);
    $store = mysqli_real_escape_string($conn, $_POST['store']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $visible = mysqli_real_escape_string($conn, $_POST['visible']);

    // Insert query
    $query = "INSERT INTO user (nama, nomor_wa, telegram_id, username, password, divisi, store, status, tanggal, visible) VALUES ('$nama', '$nomor_wa', '$telegram_id', '$username', '$password', '$divisi', '$store', '$status', '$tanggal', '$visible')";

    if (mysqli_query($conn, $query)) {
        // Redirect ke halaman users.php
        header("Location: users.php");
        exit();
    } else {
        echo "Error adding record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
</head>
<body>
    <h1>Add User</h1>
    <br>
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
        <input type="submit" name="submit" value="Add User">
    </form>
</body>
</html>

<?php
// Tutup koneksi
mysqli_close($conn);
?>
