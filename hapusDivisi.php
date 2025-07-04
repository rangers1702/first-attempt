<?php
require 'koneksi.php';

$id = $_GET['id'];

$query = "DELETE FROM report WHERE id = $id";
mysqli_query($conn, $query);

header("Location: divisi.php");
?>
