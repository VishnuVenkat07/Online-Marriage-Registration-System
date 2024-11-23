<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$dbname = "mr_esec";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("Location: home.php");
        exit();
    } else {
        echo "<script>alert('Login failed: Incorrect email or password.')</script>";
    }
}

$conn->close();
?>