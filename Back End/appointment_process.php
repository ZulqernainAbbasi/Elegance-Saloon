<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer classes
require '../Back End/PHPMailer/src/Exception.php';
require '../Back End/PHPMailer/src/PHPMailer.php';
require '../Back End/PHPMailer/src/SMTP.php';

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

class Appointment {
    private $con;

    public function __construct($db) {
        $this->con = $db->getConnection();
    }

    public function bookAppointment($name, $email, $phone, $date, $time, $service, $notes, $price) {
        $query = "INSERT INTO appointments (name, email, phone, appointment_date, appointment_time, service, notes, service_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        if ($stmt = $this->con->prepare($query)) {
            $stmt->bind_param("ssssssss", $name, $email, $phone, $date, $time, $service, $notes, $price);
            if ($stmt->execute()) {
                $this->sendConfirmationEmail($name, $email, $date, $time, $service, (int)$price);
                header("Location: ../Front End/HTML/index.php?msg=" . urlencode("Appointment booked successfully!"));
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Failed to prepare the SQL statement.";
        }
    }

    private function sendConfirmationEmail($name, $email, $date, $time, $service, $price) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'your-email@gmail.com';  // Use actual email
            $mail->Password = 'your-email-password';   // Use App Password (Gmail)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('your-email@gmail.com', 'Your Salon Name');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = "Appointment Confirmation for $service";
            $mail->Body = "Hello $name,<br><br>Your appointment for $service is confirmed on $date at $time.<br>Service Price: $price<br><br>Best regards,<br>Your Salon Name";

            $mail->send();
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $appointment = new Appointment($database);

    if (isset($_POST['submit_appointment'])) {
        // Appointment booking data
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $date = htmlspecialchars($_POST['date']);
        $time = htmlspecialchars($_POST['time']);
        $service = htmlspecialchars($_POST['service']);
        $notes = htmlspecialchars($_POST['notes']);
        $price = htmlspecialchars($_POST['price']);

        // Book the appointment
        $appointment->bookAppointment($name, $email, $phone, $date, $time, $service, $notes, $price);
    }
}
?>
