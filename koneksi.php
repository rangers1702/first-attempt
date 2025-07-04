<?php
$host     = "localhost";    // Server database (biasanya localhost)
$user     = "root";         // Username MySQL
$password = "";             // Password MySQL (biasanya kosong di XAMPP)
$database = "sistem_report"; // Ganti dengan nama database kamu

// Buat koneksi
$conn = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

    //echo "Koneksi berhasil"; // Uncomment ini kalau mau cek berhasil
?>
