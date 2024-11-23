<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marriage Registration System</title>
    <link rel="stylesheet" href="stylesindex.css">
</head>
<body>
    <nav>
        <a href="home.php">Home</a>
        <a href="register.php">Register</a>
        <a href="view.php">View Records</a>
        <a href="admin.php">Admin</a>
        <a href="logout.php">Logout</a>
    </nav>
    <div class="content">
    <h1>Welcome to the online Registration!</h1>
    <p>You are logged in as <?php echo $_SESSION['email']; ?></p>
    
        <p> Made it Marriage Registration mandatory for all marriages. In India, a marriage can either be registered under the Hindu Marriage Act, 1955 or under the Special Marriage Act, 1954. The Hindu Marriage Act is applicable to Hindus, whereas the Special Marriage Act is applicable to all citizens of India irrespective of their religion. The Hindu Marriage Act provides for registration of an already solemnized marriage, and does not provide for solemnization of a marriage by a Marriage Registrar. However, the Special Marriage Act provides for solemnization of a marriage as well as registration by a Marriage Officer.  This article will guide you and describe the whole process of Marriage Registration in India.</p>
        
        <!-- Image Section -->
        <div class="image-container">
            <img src="m.jpg" alt="Marriage Registration" class="main-image">
        </div>
    </div>
</body>
</html>
