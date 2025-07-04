<?php

    require 'koneksi.php';

    //divisi
    //enginering
    //keterangann

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
    <h2 style="text-align:center;">Data Report</h2>
    <table>
        <tr>
            <th>Nomor</th>
            <th>Divisi</th>
            <th>Kategori</th>
            <th>Keterangan</th>
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
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>