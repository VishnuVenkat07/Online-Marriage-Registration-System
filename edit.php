<?php
include 'db.php';

// Check if the record ID is passed
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch record details
    $sql = "SELECT * FROM marriage_records WHERE id = $id";
    $result = $conn->query($sql);
    $record = $result->fetch_assoc();

    if (!$record) {
        echo "<p>Record not found.</p>";
        exit;
    }
}

// Update record after form submission
if (isset($_POST['update'])) {
    $husband_name = $_POST['husband_name'];
    $wife_name = $_POST['wife_name'];
    $address = $_POST['address'];
    $marriage_date = $_POST['marriage_date'];
    $husband_aadhaar = $_POST['husband_aadhaar'];
    $wife_aadhaar = $_POST['wife_aadhaar'];

    $sql = "UPDATE marriage_records 
            SET husband_name='$husband_name', wife_name='$wife_name', address='$address', marriage_date='$marriage_date',
                husband_aadhaar='$husband_aadhaar', wife_aadhaar='$wife_aadhaar' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="popup-message">Record updated successfully!</div>';
        echo "<a href='view.php'>Go back to View Records</a>";
        exit;
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <link rel="stylesheet" href="styless.css">
</head>
<body>
    <nav>
        <a href="home.php">Home</a>
        <a href="register.php">Register</a>
        <a href="view.php">View Records</a>
    </nav>
    <div class="content">
        <h2>Edit Marriage Record</h2>
        <form method="POST" action="edit.php?id=<?php echo $id; ?>">
            <label for="husband_name">Husband's Name:</label>
            <input type="text" id="husband_name" name="husband_name" value="<?php echo $record['husband_name']; ?>" required>

            <label for="wife_name">Wife's Name:</label>
            <input type="text" id="wife_name" name="wife_name" value="<?php echo $record['wife_name']; ?>" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required><?php echo $record['address']; ?></textarea>

            <label for="marriage_date">Marriage Date:</label>
            <input type="date" id="marriage_date" name="marriage_date" value="<?php echo $record['marriage_date']; ?>" required>

            <label for="husband_aadhaar">Husband's Aadhaar:</label>
            <input type="text" id="husband_aadhaar" name="husband_aadhaar" minlength="12" maxlength="12" value="<?php echo $record['husband_aadhaar']; ?>" required>

            <label for="wife_aadhaar">Wife's Aadhaar:</label>
            <input type="text" id="wife_aadhaar" name="wife_aadhaar" minlength="12" maxlength="12" value="<?php echo $record['wife_aadhaar']; ?>" required>

            <button type="submit" name="update">Update Record</button>
        </form>
    </div>
</body>
</html>
