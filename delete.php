<?php
include 'db.php';

// Check if the record ID is passed
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete record from the database
    $sql = "DELETE FROM marriage_records WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Record deleted successfully.</p>";
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
} else {
    echo "<p>No record ID provided.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <a href="home.php">Home</a>
        <a href="register.php">Register</a>
        <a href="view.php">View Records</a>
    </nav>
    <div class="content">
        <a href="view.php">Go back to View Records</a>
    </div>
</body>
</html>
