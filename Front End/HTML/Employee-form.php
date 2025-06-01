<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Employee Registration</title>
    <link rel="stylesheet" href="../CSS/Main.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: Bootstrap Icons -->
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

        .text-center {
            font-weight: 300;
        }

        .input-group-text {
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Employee Registration</h2>
    <form action="../../Back End/C-E-FormRegistration.php" method="POST" enctype="multipart/form-data">
        <div class="row">

            <!-- First Name -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
            </div>

            <!-- Last Name -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Age -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" name="age" required>
                </div>
            </div>

            <!-- Gender -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Gender</label><br>
                    <div class="d-flex justify-content-start">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male" required>
                            <label class="form-check-label" for="genderMale">Male</label>
                        </div>
                        <div class="form-check form-check-inline ms-3">
                            <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female" required>
                            <label class="form-check-label" for="genderFemale">Female</label>
                        </div>
                        <div class="form-check form-check-inline ms-3">
                            <input class="form-check-input" type="radio" name="gender" id="genderOther" value="Other" required>
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
                    <input type="number" class="form-control" id="experience" name="experience" required>
                </div>
            </div>

            <!-- Role -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <input type="text" class="form-control" id="role" name="role" placeholder="e.g Hair Stylist, Makeup Artist" required>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Email -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>

            <!-- Phone Number -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="phonenumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" required>
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

        <!-- Submit Button -->
        <div class="text-center">
            <input value="Register" name="submit_emp" type="submit" class="btn btn-primary">
        </div>
    </form>
</div>

<!-- Bootstrap JS & Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

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
