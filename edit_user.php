<?php
// edit.php

// Include koneksi
include('koneksi.php');

// Cek apakah parameter id dikirim
if (!isset($_GET['id'])) {
    echo "No ID specified.";
    exit();
}

session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$id = intval($_GET['id']);

// Jika form disubmit
if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $nomor_wa = mysqli_real_escape_string($conn, $_POST['nomor_wa']);
    $telegram_id = mysqli_real_escape_string($conn, $_POST['telegram_id']);

    // Update query
    $query = "UPDATE user SET 
        nama = '$nama',
        nomor_wa = '$nomor_wa',
        telegram_id = '$telegram_id'
        WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        // Redirect ke halaman awal (users.php)
        header("Location: users.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Ambil data user untuk form
$query = "SELECT * FROM user WHERE id = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) !== 1) {
    echo "User not found.";
    exit();
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="post">
        <label>Name:</label><br>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required><br><br>
        <label>No WA:</label><br>
        <input type="text" name="nomor_wa" value="<?php echo htmlspecialchars($row['nomor_wa']); ?>"><br><br>
        <label>Telegram ID:</label><br>
        <input type="text" name="telegram_id" value="<?php echo htmlspecialchars($row['telegram_id']); ?>"><br><br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>

<?php
mysqli_close($conn);
?>
