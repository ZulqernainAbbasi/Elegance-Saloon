<?php
// Database connection
$con = new mysqli("localhost", "root", "", "eProject");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Get the id from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record based on the entity type (user, employee, or appointment)
    if (isset($_GET['type']) && $_GET['type'] == 'appointment') {
        $query = "DELETE FROM appointments WHERE appointment_id = ?";
    } elseif (isset($_GET['type']) && $_GET['type'] == 'employee') {
        $query = "DELETE FROM employee WHERE employee_id = ?";
    } else {
        $query = "DELETE FROM user WHERE user_id = ?";
    }

    // Prepare the query to prevent SQL injection
    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("i", $id); // "i" means the parameter is an integer (id is an integer)
        $stmt->execute();

        // Check if the record was deleted successfully
        if ($stmt->affected_rows > 0) {
            echo "Record deleted successfully.";
        } else {
            echo "Failed to delete the record or the record does not exist.";
        }

        $stmt->close();
    }
}

// Close the database connection
$con->close();

// Redirect back to the list page
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>
