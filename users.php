<?php
// users.php

// Include database connection
include('koneksi.php');

// Fetch users from the database
$query = "SELECT * FROM user";
$result = mysqli_query($conn, $query);

// // Check if any users exist
// if (mysqli_num_rows($result) > 0) {
//     // Output data for each user
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo "ID: " . $row["id"] . " - Name: " . $row["nama"] . " - No WA: " . $row["nomor_wa"] . " - Telegram ID: " . $row["telegram_id"] . "<br>";
//     }
// } else {
//     echo "No users found.";
// }

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>No WA</th>
            <th>Telegram ID</th>
        </tr>
        <?php
        // Check if any users exist
        if (mysqli_num_rows($result) > 0) {
            // Output data for each user
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["nomor_wa"] . "</td>";
                echo "<td>" . $row["telegram_id"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No users found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
