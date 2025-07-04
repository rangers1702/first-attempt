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
                        <svg class="h-8 w-8 text-red-500" <svg  width="16"  height="24"  viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />  <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" /></svg>
                        Edit
                    </button>
                </a> |
                <a href="hapusDivisi.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin hapus?')">
                    <button class="hapus">
                         <svg class="h-8 w-8 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Hapus 
                    </button>
                </a> 
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>