<?php

    require 'koneksi.php';

    //divisi
    //enginering
    //keterangann

?>

<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

    $query = "SELECT * FROM report LIMIT 1, 20;";
    $result = mysqli_query($conn, $query);  

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Laporan</title>
    <link rel="stylesheet" href="assets/css/styleDivisi.css">
</head>
<body>
    
<div class="container">
    <h2 style="text-align:center;">Data Report</h2>
    <a href="index.php">Halaman Awal</a>
    <a href="users.php">Danang's Page</a>
    <a href="tambahDivisi.php">
        <button class="tambah">
            Tambah Data
        </button>
    </a>
        <table>
            <tr>
                <th>Nomor</th>
                <th>Divisi</th>
                <th>Kategori</th>
                <th>Keterangan</th>
                <th>Manage</th>
            </tr>
            <?php
                $i=1;
            ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $row['divisi']; ?></td>
                <td><?= $row['kategori']; ?></td>
                <td><?= $row['keterangan']; ?></td>
                 <td>
                    <a href="editDivisi.php?id=<?= $row['id']; ?>">
                        <button class="edit">
                            <svg class="h-8 w-8 text-red-500" <svg  width="16"  height="16"  viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />  <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" /></svg>
                            Edit
                        </button>
                    </a> |
                    <a href="hapusDivisi.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin hapus?')">
                        <button class="hapus">
                             <svg class="h-8 w-8 text-red-500"  width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            Hapus 
                        </button>
                    </a> 
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>