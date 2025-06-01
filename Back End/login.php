<?php
session_start();

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "eProject";
    public $connection;

    public function __construct() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}

class User_1 {
    private $db;
    private $email;
    private $password;

    public function __construct($db, $email, $password) {
        $this->db = $db;
        $this->email = $email;
        $this->password = $password;
    }

    public function authenticate() {
        // Check in user table
        $userQuery = $this->db->prepare("SELECT user_id FROM user WHERE user_email = ? AND user_password = ?");
        $userQuery->bind_param("ss", $this->email, $this->password);
        $userQuery->execute();
        $userResult = $userQuery->get_result();

        if ($userResult->num_rows == 1) {
            // User found in the 'user' table
            $user_id = $userResult->fetch_assoc()['user_id'];
            $_SESSION['user_id'] = $user_id;
            header("Location: ../Front End/HTML/appointment.php?user_id=" . urlencode($user_id));
            exit();
        }

        // Check in employee table if not found in user table
        $employeeQuery = $this->db->prepare("SELECT employee_id FROM Employee WHERE employee_email = ? AND employee_password = ?");
        $employeeQuery->bind_param("ss", $this->email, $this->password);
        $employeeQuery->execute();
        $employeeResult = $employeeQuery->get_result();

        if ($employeeResult->num_rows == 1) {
            // Employee found in the 'Employee' table
            $employee_id = $employeeResult->fetch_assoc()['employee_id'];
            $_SESSION['employee_id'] = $employee_id;
            header("Location: ../Front End/HTML/index.php?employee_id=" . urlencode($employee_id));
            exit();
        }

        // If no match is found, redirect with an error
        header("Location: index.php?msg=" . urlencode("Invalid email or password"));
        exit();
    }
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Initialize Database and User objects
    $database = new Database();
    $dbConnection = $database->getConnection();

    $user_1 = new User_1($dbConnection, $email, $password);
    $user_1->authenticate();
}

?>
