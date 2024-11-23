<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        h1, h2 {
            font-weight: bold;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        button {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Header -->
        <div class="row bg-primary text-white p-3">
            <div class="col">
                <h1 class="text-center">Admin Dashboard</h1>
                <a href="home.php"><button>Home</button></a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row mt-4">
            <div class="col-12">
                <h2>User Details</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'db_connect.php';

                            // Adjust query to match the table structure
                            $sql = "SELECT id, email, password FROM users";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['password'] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4' class='text-center'>No users found</td></tr>";
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const editButtons = document.querySelectorAll(".btn-success");
            const deleteButtons = document.querySelectorAll(".btn-danger");

            editButtons.forEach((button) => {
                button.addEventListener("click", () => {
                    alert("Edit functionality is not implemented yet.");
                });
            });

            deleteButtons.forEach((button) => {
                button.addEventListener("click", () => {
                    if (confirm("Are you sure you want to delete this user?")) {
                        alert("Delete functionality is not implemented yet.");
                    }
                });
            });
        });
    </script>
    <!-- Bootstrap JS and Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="script.js"></script>
</body>
</html>
