<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Back End/PHPMailer/src/Exception.php';
require '../Back End/PHPMailer/src/PHPMailer.php';
require '../Back End/PHPMailer/src/SMTP.php';

class MessageHandler {
    private $dbConnection;
    private $email;
    private $firstName;
    private $lastName;
    private $message;

    public function __construct($dbHost, $dbUser, $dbPass, $dbName) {
        // Database connection
        $this->dbConnection = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

        if ($this->dbConnection->connect_error) {
            die("Connection failed: " . $this->dbConnection->connect_error);
        }
    }

    public function setMessageData($firstName, $lastName, $email, $message) {
        $this->firstName = htmlspecialchars($firstName);
        $this->lastName = htmlspecialchars($lastName);
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $this->message = htmlspecialchars($message);

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format.");
        }
    }

    public function insertMessage() {
        $query = "INSERT INTO Messages (user_firstName, user_lastName, user_email, user_message) 
                  VALUES (?, ?, ?, ?)";

        $stmt = $this->dbConnection->prepare($query);
        $stmt->bind_param("ssss", $this->firstName, $this->lastName, $this->email, $this->message);

        if ($stmt->execute()) {
            return "Record Inserted Successfully";
        } else {
            throw new Exception("Record not Inserted: " . $this->dbConnection->error);
        }
    }

    public function sendConfirmationEmail() {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'student1498744.aptechiic@gmail.com';
            $mail->Password = 'hqgroekedjoulohs';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Set the sender and recipient
            $mail->setFrom('student1498744.aptechiic@gmail.com', 'Aptechiic');
            $mail->addAddress($this->email);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = "Thank you for your message, {$this->firstName}!";
            $mail->Body = nl2br("Hello {$this->firstName},\n\nThank you for reaching out to us! We have received the following message from you:\n\n{$this->message}\n\nWe will get back to you soon.\n\nBest regards,\nAptechiic");

            $mail->send();
            return "Email sent successfully!";
        } catch (Exception $e) {
            throw new Exception("Email could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
    }

    public function __destruct() {
        $this->dbConnection->close();
    }
}

// Main script execution
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $handler = new MessageHandler("localhost:3306", "root", "", "eProject");
        $handler->setMessageData($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['message']);
        
        // Insert message and send confirmation email
        $insertMsg = $handler->insertMessage();
        echo $insertMsg;
        
        $emailMsg = $handler->sendConfirmationEmail();
        echo $emailMsg;
        
        // Redirect on success
        header("Location: ../Front End/HTML/index.php?msg=" . urlencode($insertMsg));
        exit;

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}
?>
