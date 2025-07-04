<?php
require_once __DIR__ . "/config.php";

$host     = DB_HOST; // Server database (biasanya localhost)
$user     = DB_USERNAME; // Username MySQL
$password = DB_PASSWORD; // Password MySQL (biasanya kosong di XAMPP)
$database = DB_NAME; // Ganti dengan nama database kamu

// Buat koneksi
$conn = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

//echo "Koneksi berhasil"; // Uncomment ini kalau mau cek berhasil
