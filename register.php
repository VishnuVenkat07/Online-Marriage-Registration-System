<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Marriage</title>
    <link rel="stylesheet" href="styless.css">
</head>
<body>
    <nav>
        <a href="home.php">Home</a>
        <a href="register.php">Register</a>
        <a href="view.php">View Records</a>
    </nav>
    <div class="content">
        <h2>Marriage Registration</h2>
        <form method="POST" action="register.php">
            <label for="husband_name">Husband's Name:</label>
            <input type="text" id="husband_name" name="husband_name" required>

            <label for="wife_name">Wife's Name:</label>
            <input type="text" id="wife_name" name="wife_name" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>

            <label for="marriage_date">Marriage Date:</label>
            <input type="date" id="marriage_date" name="marriage_date" required>

            <label for="husband_aadhaar">Husband's Aadhaar:</label>
            <input type="text" id="husband_aadhaar" name="husband_aadhaar" minlength="12" maxlength="12" required>

            <label for="wife_aadhaar">Wife's Aadhaar:</label>
            <input type="text" id="wife_aadhaar" name="wife_aadhaar" minlength="12" maxlength="12" required>

            <button type="submit" name="submit">Register</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $husband_name = $_POST['husband_name'];
            $wife_name = $_POST['wife_name'];
            $address = $_POST['address'];
            $marriage_date = $_POST['marriage_date'];
            $husband_aadhaar = $_POST['husband_aadhaar'];
            $wife_aadhaar = $_POST['wife_aadhaar'];

            $sql = "INSERT INTO marriage_records (husband_name, wife_name, address, marriage_date, husband_aadhaar, wife_aadhaar)
                    VALUES ('$husband_name', '$wife_name', '$address', '$marriage_date', '$husband_aadhaar', '$wife_aadhaar')";

if ($conn->query($sql) === TRUE) {
    echo '<div class="popup-message">Registration Successful!</div>';
} else {
    echo "<p>Error: " . $conn->error . "</p>";
}

        }
        ?>
    </div>
</body>
</html>
