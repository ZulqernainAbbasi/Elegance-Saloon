<?php
// Database connection
$con = new mysqli("localhost", "root", "", "eProject");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Get the employee ID from the query string
if (isset($_GET['id'])) {
    $employee_id = $_GET['id'];

    // Query to get employee details by ID
    $query = "SELECT * FROM employee WHERE employee_id = ?";
    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("i", $employee_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $employee = $result->fetch_assoc();
        } else {
            echo "Employee not found!";
            exit();
        }
    } else {
        echo "Failed to prepare the query.";
        exit();
    }
} else {
    echo "Employee ID is missing.";
    exit();
}

// Handle form submission for updating employee
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $age = htmlspecialchars($_POST['age']);
    $gender = htmlspecialchars($_POST['gender']);
    $experience = htmlspecialchars($_POST['experience']);
    $role = htmlspecialchars($_POST['role']);
    $email = htmlspecialchars($_POST['email']);
    $phonenumber = htmlspecialchars($_POST['phonenumber']);
    $password = htmlspecialchars($_POST['password']); // Add password handling if needed
    $repassword = htmlspecialchars($_POST['repassword']);

    // Check if passwords match
    if ($password !== $repassword) {
        echo "Passwords do not match.";
        exit();
    }

    // Update query
    $update_query = "UPDATE employee SET employee_firstName = ?, employee_lastName = ?, employee_age = ?, employee_gender = ?, employee_experience = ?, employee_role = ?, employee_email = ?, employee_phoneNumber = ?, employee_password = ?, employee_rePassword = ? WHERE employee_id = ?";

    if ($stmt = $con->prepare($update_query)) {
        $stmt->bind_param("ssisssssssi", $firstname, $lastname, $age, $gender, $experience, $role, $email, $phonenumber, $password,$repassword, $employee_id);

        if ($stmt->execute()) {
            echo "Employee updated successfully.";
            header("Location: employees.php"); // Redirect after update
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Failed to prepare the SQL statement.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="../CSS/Main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Custom button style */
        .btn {
            margin: 10px 5px;
            padding: 10px 20px;
            font-size: 14px;
            color: white;
            background-color: #d8c295;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: .2s linear;
            border: none;
        }
        .btn:hover {
            background-color: transparent;
            color: #d8c295;
            border: 1px solid #d8c295;
            font-weight: bold;
            transition: .2s linear;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Edit Employee</h2>
    <form action="employee_edit.php?id=<?php echo $employee_id; ?>" method="POST">
        <div class="row">
            <!-- First Name -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $employee['employee_firstName']; ?>" required>
                </div>
            </div>

            <!-- Last Name -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $employee['employee_lastName']; ?>" required>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Age -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" name="age" value="<?php echo $employee['employee_age']; ?>" required>
                </div>
            </div>

            <!-- Gender -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Gender</label><br>
                    <div class="d-flex justify-content-start">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male" <?php echo ($employee['employee_gender'] == 'Male') ? 'checked' : ''; ?> required>
                            <label class="form-check-label" for="genderMale">Male</label>
                        </div>
                        <div class="form-check form-check-inline ms-3">
                            <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female" <?php echo ($employee['employee_gender'] == 'Female') ? 'checked' : ''; ?> required>
                            <label class="form-check-label" for="genderFemale">Female</label>
                        </div>
                        <div class="form-check form-check-inline ms-3">
                            <input class="form-check-input" type="radio" name="gender" id="genderOther" value="Other" <?php echo ($employee['employee_gender'] == 'Other') ? 'checked' : ''; ?> required>
                            <label class="form-check-label" for="genderOther">Other</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Experience -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="experience" class="form-label">Experience (Years)</label>
                    <input type="number" class="form-control" id="experience" name="experience" value="<?php echo $employee['employee_experience']; ?>" required>
                </div>
            </div>

            <!-- Role -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <input type="text" class="form-control" id="role" name="role" value="<?php echo $employee['employee_role']; ?>" required>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Email -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $employee['employee_email']; ?>" required>
                </div>
            </div>

            <!-- Phone Number -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="phonenumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="<?php echo $employee['employee_phoneNumber']; ?>" required>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Password -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <span class="input-group-text" onclick="togglePasswordVisibility('password')">
                            <i class="bi bi-eye" id="togglePasswordIcon1"></i>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Retype Password -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="repassword" class="form-label">Retype Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="repassword" name="repassword" required>
                        <span class="input-group-text" onclick="togglePasswordVisibility('repassword')">
                            <i class="bi bi-eye" id="togglePasswordIcon2"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <input value="Update" name="submit_emp" type="submit" class="btn btn-primary">
        </div>
    </form>
</div>

<script>
    function togglePasswordVisibility(fieldId) {
        const passwordField = document.getElementById(fieldId);
        const iconId = fieldId === "password" ? "togglePasswordIcon1" : "togglePasswordIcon2";
        const icon = document.getElementById(iconId);
        
        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.replace("bi-eye", "bi-eye-slash");
        } else {
            passwordField.type = "password";
            icon.classList.replace("bi-eye-slash", "bi-eye");
        }
    }
</script>

</body>
</html>
