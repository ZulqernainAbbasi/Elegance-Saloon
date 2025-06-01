<?php
// Database connection
$con = new mysqli("localhost", "root", "", "eProject");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Query to fetch all users
$query = "SELECT * FROM appointments";
$result = $con->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        /* Sidebar styles */
        .sidebar {
            height: 100vh;
            background-color: #17a2b8;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            padding: 10px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #138496;
            color: white;
        }
        .main-content {
            padding: 20px;
        }
        .dashboard-card {
            border-radius: 10px;
            padding: 20px;
            color: white;
        }
        .dashboard-card.green { background-color: #28a745; }
        .dashboard-card.yellow { background-color: #ffc107; color: black; }
        .dashboard-card.blue { background-color: #007bff; }
        .dashboard-card.gray { background-color: #6c757d; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 sidebar">
            <h2 class="text-white text-center">Admin Dashboard</h2>
            <a href="admin_layout.php">Dashboard</a>
            <ul class="list-unstyled ms-3">
                <li><a href="users.php">Users</a></li>
                <li><a href="employees.php">Employees</a></li>
                <li><a href="appointments.php">Appointments</a></li>
                <li><a href="messages.php">Messages</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="col-md-10 main-content">
            <h2>Users List</h2>

            <!-- Table to display user data -->
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Service</th>
                        <th>Notes</th>
                        <th>Service Price</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are any rows returned
                    if ($result->num_rows > 0) {
                        // Loop through and display each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row['appointment_id'] . "</td>
                                    <td>" . $row['name'] . "</td>
                                    <td>" . $row['email'] . "</td>
                                    <td>" . $row['phone'] . "</td>
                                    <td>" . $row['appointment_date'] . "</td>
                                    <td>" . $row['appointment_time'] . "</td>
                                    <td>" . $row['service'] . "</td>
                                    <td>" . $row['notes'] . "</td>
                                    <td>" . $row['service_price'] . "</td>
                                    <td>" . $row['created_at'] . "</td>
                                    <td>
                                        <a href='appointment_edit.php?id=" . $row['appointment_id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                        <a href='delete.php?id=" . $row['appointment_id'] . "&type=appointment' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</a>                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>No Appointment found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </main>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
// Close database connection
$con->close();
?>
