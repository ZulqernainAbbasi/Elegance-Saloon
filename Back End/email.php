<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Back End/PHPMailer/src/Exception.php';
require '../Back End/PHPMailer/src/PHPMailer.php';
require '../Back End/PHPMailer/src/SMTP.php';

class Database {
    protected $con;

    public function __construct() {
        $this->con = new mysqli("localhost", "root", "", "eProject");

        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
    }
}

class User extends Database {
    public function insertUser($firstname, $lastname, $gender, $phonenumber, $email, $password) {
        $query = "INSERT INTO user (user_firstName, user_lastName, user_gender, user_phoneNumber, user_email, user_password) 
                  VALUES (?, ?, ?, ?, ?, ?)";

        if ($stmt = $this->con->prepare($query)) {
            $stmt->bind_param("ssssss", $firstname, $lastname, $gender, $phonenumber, $email, $password);

            if ($stmt->execute()) {
                $this->sendWelcomeEmail($firstname, $email);
                $msg = "Record Inserted Successfully";
                header("Location: ../Front End/HTML/index.php?msg=$msg");
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
            $mail->Username = 'student1498744.aptechiic@gmail.com';
            $mail->Password = 'hqgroekedjoulohs';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('student1498744.aptechiic@gmail.com', 'Aptechiic');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = "Welcome, $name!";
            $mail->Body = "Hello $name,<br><br>Thank you for registering! We're excited to have you with us.<br><br>Best regards,<br>Elegance Salon";

            $mail->send();
            echo 'Welcome email sent successfully!';
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

class Employee extends Database {
    public function insertEmployee($firstname, $lastname, $gender, $phonenumber, $email, $password) {
        $query = "INSERT INTO Employee (user_firstName, user_lastName, user_gender, user_phoneNumber, user_email, user_password) 
                  VALUES (?, ?, ?, ?, ?, ?)";

        if ($stmt = $this->con->prepare($query)) {
            $stmt->bind_param("ssssss", $firstname, $lastname, $gender, $phonenumber, $email, $password);

            if ($stmt->execute()) {
                $this->sendWelcomeEmail($firstname, $email);
                $msg = "Employee Record Inserted Successfully";
                header("Location: ../Front End/HTML/index.php?msg=$msg");
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
        // Same email logic as the User class
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'student1498744.aptechiic@gmail.com';
            $mail->Password = 'hqgroekedjoulohs';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('student1498744.aptechiic@gmail.com', 'Aptechiic');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = "Welcome to the Team, $name!";
            $mail->Body = "Hello $name,<br><br>Welcome to the team! We're excited to work with you.<br><br>Best regards,<br>Elegance Salon";

            $mail->send();
            echo 'Welcome email sent successfully!';
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    $user = new User();

    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $gender = htmlspecialchars($_POST['gender']);
    $phonenumber = htmlspecialchars($_POST['phonenumber']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $user->insertUser($firstname, $lastname, $gender, $phonenumber, $email, $password);
}

?>
