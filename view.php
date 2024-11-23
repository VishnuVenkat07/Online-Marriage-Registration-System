<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <a href="home.php">Home</a>
        <a href="register.php">Register</a>
        <a href="view.php">View Records</a>
    </nav>
    <div class="content">
        <h2>Marriage Records</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Husband's Name</th>
                <th>Wife's Name</th>
                <th>Address</th>
                <th>Marriage Date</th>
                <th>Husband's Aadhaar</th>
                <th>Wife's Aadhaar</th>
                <th>Actions</th>
            </tr>

            <?php
            $sql = "SELECT * FROM marriage_records";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['husband_name']}</td>
                            <td>{$row['wife_name']}</td>
                            <td>{$row['address']}</td>
                            <td>{$row['marriage_date']}</td>
                            <td>{$row['husband_aadhaar']}</td>
                            <td>{$row['wife_aadhaar']}</td>
                            <td>
                                <a href='edit.php?id={$row['id']}'>Edit</a> | 
                                <a href='delete.php?id={$row['id']}'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No records found</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
