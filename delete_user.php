<?php
// delete.php

// Include database connection
include('koneksi.php');

// Cek apakah parameter id dikirim
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Pastikan id berupa integer

    // Jalankan query hapus
    $query = "DELETE FROM user WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        // Redirect ke halaman sebelumnya
        if (!empty($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            // Jika referer tidak tersedia, redirect ke users.php
            header("Location: users.php");
        }
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "No ID specified.";
}

// Tutup koneksi
mysqli_close($conn);
?>
