<?php
require_once __DIR__ . "/koneksi.php";

session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<?php

$dataArray = [];
$sql = "SELECT * FROM user LIMIT 20";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $dataArray[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
</head>

<body>
    <nav>
        <a href="users.php">Danang's Page</a> |
        <a href="divisi.php">Salis's Page</a>
    </nav>

    <hr>

    <h1>Index Pokok</h1>
    <table>
        <thead>
            <th>Name</th>
            <th>WA</th>
            <th>action</th>
        </thead>
        <tbody>
            <?php
            foreach ($dataArray as $data) { ?>
                <tr>
                    <td><?= $data['nama']  ?></td>
                    <td><?= $data['nomor_wa']  ?></td>
                    <td>
                        <a href="#">Edit</a>
                        <a href="#">Delete</a>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</body>

</html>