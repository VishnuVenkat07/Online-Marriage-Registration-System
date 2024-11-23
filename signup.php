<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "mr_esec";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['signupEmail'];
    $password = $_POST['signupPassword'];

    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Sign up successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>