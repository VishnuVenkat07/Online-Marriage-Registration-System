<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mr_esec";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($newPassword !== $confirmPassword) {
        echo "Passwords do not match.";
    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            
            $stmt->close(); 

            $updateStmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
            $updateStmt->bind_param("ss", $newPassword, $email);
            if ($updateStmt->execute()) {
                header("Location: index.php");
            } else {
                echo "Error updating password.";
            }
            $updateStmt->close(); t
        } else {
            echo "Email not found.";
        }
        /
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Reset Password</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="newPassword">New Password:</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                <i class="fas fa-eye" id="toggleNewPassword"></i>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                <i class="fas fa-eye" id="toggleConfirmPassword"></i>
            </div>
            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
    </div>

    <script>
        document.getElementById('toggleNewPassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('newPassword');
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('confirmPassword');
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
        });
    </script>
</body>
</html>