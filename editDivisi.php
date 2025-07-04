<?php
require 'koneksi.php';

session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Ambil data berdasarkan ID
$id = $_GET['id'];
$query = "SELECT * FROM report WHERE id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

// Jika form disubmit
if (isset($_POST['submit'])) {
    $divisi = $_POST['divisi'];
    $kategori = $_POST['kategori'];
    $keterangan = $_POST['keterangan'];

    $update = "UPDATE report SET divisi='$divisi', kategori='$kategori', keterangan='$keterangan' WHERE id=$id";
    mysqli_query($conn, $update);
    header("Location: divisi.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>
    <h2>Edit Report</h2>
    <form method="POST">
        <label>Divisi:</label><br>
        <input type="text" name="divisi" value="<?= $data['divisi']; ?>"><br><br>

        <label>Kategori:</label><br>
        <input type="text" name="kategori" value="<?= $data['kategori']; ?>"><br><br>

        <label>Keterangan:</label><br>
        <textarea name="keterangan"><?= $data['keterangan']; ?></textarea><br><br>

        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>
