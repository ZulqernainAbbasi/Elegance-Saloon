<?php
// Constants for admin credentials
define('ADMIN_EMAIL', "zulqernainabbasi262@gmail.com");
define('ADMIN_PASSWORD_HASH', password_hash("Kuchbhinhi", PASSWORD_DEFAULT)); // Use the hash of the password

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email and password match the admin credentials
    if ($email === ADMIN_EMAIL && password_verify($password, ADMIN_PASSWORD_HASH)) {
        // Admin login successful
        if (isset($_POST['remember'])) {
            setcookie('admin_email', $email, time() + 60 * 60 * 24 * 30); // Store for 30 days
        }
        header("Location: ../admin/admin_layout.php");
        exit();
    } else {
        // Invalid email or password
        header("Location: ../admin/login.php?msg=" . urlencode("Invalid email or password"));
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../CSS/login.css">
    <link rel="stylesheet" href="../../CSS/Main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="image-section"></div>
        <div class="form-section">
            <h2>Login to continue</h2>

            <!-- Show error message if it exists -->
            <?php if (isset($_GET['msg'])) {
                echo "<script>alert('" . htmlspecialchars($_GET['msg'], ENT_QUOTES, 'UTF-8') . "');</script>";
            } ?>

            <!-- Login Form -->
            <form action="" method="POST">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="abc@gmail.com" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                    <a href="#" class="forgot-password">Forgot password?</a>
                </div>
                <input class="login-button" type="submit" name="submit" value="Login">
            </form>

            <!-- Back to Home Link -->
            <div class="home-link">
                <a href="index.php">Back to Home</a>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="../JS/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
