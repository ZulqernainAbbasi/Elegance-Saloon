<?php
// Database connection
$con = new mysqli("localhost", "root", "", "eProject");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Get the user ID from the query string
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Query to get user details by ID
    $query1 = "SELECT * FROM user WHERE user_id = ?";
    if ($stmt = $con->prepare($query1)) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
        } else {
            echo "User not found!";
            exit();
        }
        $stmt->close();
    } else {
        echo "Failed to prepare the query.";
        exit();
    }
} else {
    echo "User ID is missing.";
    exit();
}

// Handle form submission for updating user
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $gender = htmlspecialchars($_POST['gender']);
    $email = htmlspecialchars($_POST['email']);
    $phonenumber = htmlspecialchars($_POST['phonenumber']);
    $password = $_POST['password']; // Plain password to be hashed


    // Update query
    $update_query1 = "UPDATE user SET user_firstName = ?, user_lastName = ?, user_gender = ?, user_email = ?, user_phoneNumber = ?, user_password = ? WHERE user_id = ?";

    if ($stmt = $con->prepare($update_query1)) {
        $stmt->bind_param("ssssssi", $firstname, $lastname, $gender, $email, $phonenumber, $password, $user_id);

        if ($stmt->execute()) {
            header("Location: users.php"); // Redirect after update
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Failed to prepare the SQL statement.";
    }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../CSS/Main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
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
    <h2 class="text-center">Edit User</h2>
    <form action="user_edit.php?id=<?php echo $user_id; ?>" method="POST">
        <div class="row">
            <!-- First Name -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['user_firstName']; ?>" required>
                </div>
            </div>

            <!-- Last Name -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['user_lastName']; ?>" required>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Gender -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Gender</label><br>
                    <div class="d-flex justify-content-start">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male" <?php echo ($user['user_gender'] == 'Male') ? 'checked' : ''; ?> required>
                            <label class="form-check-label" for="genderMale">Male</label>
                        </div>
                        <div class="form-check form-check-inline ms-3">
                            <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female" <?php echo ($user['user_gender'] == 'Female') ? 'checked' : ''; ?> required>
                            <label class="form-check-label" for="genderFemale">Female</label>
                        </div>
                        <div class="form-check form-check-inline ms-3">
                            <input class="form-check-input" type="radio" name="gender" id="genderOther" value="Other" <?php echo ($user['user_gender'] == 'Other') ? 'checked' : ''; ?> required>
                            <label class="form-check-label" for="genderOther">Other</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Email -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['user_email']; ?>" required>
                </div>
            </div>

            <!-- Phone Number -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="phonenumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="<?php echo $user['user_phoneNumber']; ?>" required>
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
        </div>

        <div class="text-center">
            <input value="Update" name="submit_user" type="submit" class="btn btn-primary">
        </div>
    </form>
</div>

<script>
    function togglePasswordVisibility(fieldId) {
        const passwordField = document.getElementById(fieldId);
        const icon = document.getElementById("togglePasswordIcon1");
        
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
