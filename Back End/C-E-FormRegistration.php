<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer classes
require '../Back End/PHPMailer/src/Exception.php';
require '../Back End/PHPMailer/src/PHPMailer.php';
require '../Back End/PHPMailer/src/SMTP.php';

// Database connection class
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

// User class (for user registration)
class User extends Database {
    public function insertUser($firstname, $lastname, $gender, $phonenumber, $email, $password) {
        // Check if email already exists
        $query = "SELECT * FROM user WHERE user_email = ?";
        if ($stmt = $this->con->prepare($query)) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                echo "Error: Email already exists.";
                return;
            }
            $stmt->close();
        }

        $query = "INSERT INTO user (user_firstName, user_lastName, user_gender, user_phoneNumber, user_email, user_password) 
                  VALUES (?, ?, ?, ?, ?, ?)";

        if ($stmt = $this->con->prepare($query)) {
            $stmt->bind_param("ssssss", $firstname, $lastname, $gender, $phonenumber, $email, $password);

            if ($stmt->execute()) {
                $this->sendWelcomeEmail($firstname, $email);
                header("Location: ../Front End/HTML/index.php?msg=User Registered Successfully");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Failed to prepare the SQL statement.";
        }
    }

    private function sendWelcomeEmail($name, $email) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'your-email@gmail.com';  // Use actual email
            $mail->Password = 'your-email-password';   // Use App Password (Gmail)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('your-email@gmail.com', 'Your App Name');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = "Welcome, $name!";
            $mail->Body = "Hello $name,<br><br>Thank you for registering! We're excited to have you with us.<br><br>Best regards,<br>Your App Name";

            $mail->send();
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

// Employee class (for employee registration)
class Employee extends Database {
    public function insertEmployee($firstname, $lastname, $age, $gender, $experience, $role, $email, $phonenumber, $password, $repassword) {
        if ($password !== $repassword) {
            echo "Error: Passwords do not match.";
            return;
        }

        // Check if email already exists
        $query = "SELECT * FROM Employee WHERE employee_email = ?";
        if ($stmt = $this->con->prepare($query)) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                echo "Error: Email already exists.";
                return;
            }
            $stmt->close();
        }

        $query = "INSERT INTO Employee (employee_firstName, employee_lastName, employee_age, employee_gender, employee_experience, employee_role, employee_email, employee_phoneNumber, employee_password, employee_repassword) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $this->con->prepare($query)) {
            $stmt->bind_param("ssisssssss", $firstname, $lastname, $age, $gender, $experience, $role, $email, $phonenumber, $password, $repassword);

            if ($stmt->execute()) {
                $this->sendWelcomeEmail($firstname, $email);
                header("Location: ../Front End/HTML/index.php?msg=Employee Registered Successfully");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Failed to prepare the SQL statement.";
        }
    }

    private function sendWelcomeEmail($name, $email) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'your-email@gmail.com';  // Use actual email
            $mail->Password = 'your-email-password';   // Use App Password (Gmail)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('your-email@gmail.com', 'Your Company');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = "Welcome to the Team, $name!";
            $mail->Body = "Hello $name,<br><br>Welcome to the team!<br><br>Best regards,<br>Your Company Name";

            $mail->send();
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

// Create database connection instance
$database = new Database();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit_user'])) {
        // Handle user registration
        $user = new User($database);
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $gender = htmlspecialchars($_POST['gender']);
        $phonenumber = htmlspecialchars($_POST['phonenumber']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $user->insertUser($firstname, $lastname, $gender, $phonenumber, $email, $password);
    } elseif (isset($_POST['submit_emp'])) {
        // Handle employee registration
        $employee = new Employee($database);
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $age = htmlspecialchars($_POST['age']);
        $gender = htmlspecialchars($_POST['gender']);
        $experience = htmlspecialchars($_POST['experience']);
        $role = htmlspecialchars($_POST['role']);
        $email = htmlspecialchars($_POST['email']);
        $phonenumber = htmlspecialchars($_POST['phonenumber']);
        $password = htmlspecialchars($_POST['password']);
        $repassword = htmlspecialchars($_POST['repassword']);
        $employee->insertEmployee($firstname, $lastname, $age, $gender, $experience, $role, $email, $phonenumber, $password, $repassword);
    }
}
?>
