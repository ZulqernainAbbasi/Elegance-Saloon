<?php
// Database class for handling the connection
class Database {
    protected $con;

    public function __construct() {
        $this->con = new mysqli("localhost", "root", "", "eProject");

        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
    }

    public function getConnection() {
        return $this->con;
    }
}

// User class for user-related operations
class User {
    protected $con;

    public function __construct($db) {
        $this->con = $db->getConnection(); // Use the database connection
    }

    public function getTotalUsers() {
        $query = "SELECT COUNT(*) AS total_users FROM user";
        $result = $this->con->query($query);
        $row = $result->fetch_assoc();
        return $row['total_users'];
    }
}

// Employee class for employee-related operations
class Employee {
    protected $con;

    public function __construct($db) {
        $this->con = $db->getConnection(); // Use the database connection
    }

    public function getTotalEmployees() {
        $query = "SELECT COUNT(*) AS total_employees FROM Employee";
        $result = $this->con->query($query);
        $row = $result->fetch_assoc();
        return $row['total_employees'];
    }
}

// Appointment class for appointment-related operations
class Appointment {
    protected $con;

    public function __construct($db) {
        $this->con = $db->getConnection(); // Use the database connection
    }

    public function getTotalAppointments() {
        $query = "SELECT COUNT(*) AS total_appointments FROM appointments";
        $result = $this->con->query($query);
        $row = $result->fetch_assoc();
        return $row['total_appointments'];
    }

    // Method to get the total sales (sum of appointment prices)
    public function getTotalSales() {
        // Casting the appointment_price (string) to DECIMAL to sum the values
        $query = "SELECT SUM(CAST(service_price AS DECIMAL(10,2))) AS total_sales FROM appointments";
        $result = $this->con->query($query);
        $row = $result->fetch_assoc();
        return $row['total_sales'];
    }
}

// Fetching the data
$database = new Database();  // Create a new Database object

// Pass the Database object to the classes
$userObj = new User($database);
$employeeObj = new Employee($database);
$appointmentObj = new Appointment($database);

$totalUsers = $userObj->getTotalUsers();
$totalEmployees = $employeeObj->getTotalEmployees();
$totalAppointments = $appointmentObj->getTotalAppointments();
$totalSales = $appointmentObj->getTotalSales(); // Get total sales
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
                <li><a href="Users.php">Users</a></li>
                <li><a href="Employees.php">Employees</a></li>
                <li><a href="Appointments.php">Appointments</a></li>
                <li><a href="messages.php">Messages</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="col-md-10 main-content">
            <h2>Dashboard</h2>

            <!-- Dashboard Cards -->
            <div class="row">
                <div class="col-md-3">
                    <div class="dashboard-card green text-center">
                        <h3>$<?php echo number_format($totalSales, 2); ?></h3>
                        <p>Sales</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard-card yellow text-center">
                        <h3><?php echo number_format($totalAppointments); ?></h3>
                        <p>Appointments</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard-card blue text-center">
                        <h3><?php echo number_format($totalUsers); ?></h3>
                        <p>Users</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard-card gray text-center">
                        <h3><?php echo number_format($totalEmployees); ?></h3>
                        <p>Employees</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

</body>
</html>
