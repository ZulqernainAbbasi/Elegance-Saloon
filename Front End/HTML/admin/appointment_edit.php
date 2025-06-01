<?php
// Database connection
$con = new mysqli("localhost", "root", "", "eProject");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Get the appointment ID from the query string
if (isset($_GET['id'])) {
    $appointment_id = $_GET['id'];

    // Fetch appointment details
    $query = "SELECT * FROM appointments WHERE appointment_id = ?";
    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("i", $appointment_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $appointment = $result->fetch_assoc();
        } else {
            echo "Appointment not found!";
            exit();
        }
    } else {
        echo "Failed to prepare the query.";
        exit();
    }
} else {
    echo "Appointment ID is missing.";
    exit();
}

// Handle form submission for updating appointment
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $appointment_id = $_POST['appointment_id'];
    $firstname = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phonenumber = htmlspecialchars($_POST['phone']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $service = htmlspecialchars($_POST['service']);
    $notes = htmlspecialchars($_POST['notes']);
    $servicePrice = htmlspecialchars($_POST['price']);

    // Update query
    $update_query = "UPDATE appointments SET name = ?, email = ?, phone = ?, appointment_date = ?, appointment_time = ?, service = ?, notes = ?, service_price = ? WHERE appointment_id = ?";

    if ($stmt = $con->prepare($update_query)) {
        $stmt->bind_param("sssssssis", $firstname, $email, $phonenumber, $date, $time, $service, $notes, $servicePrice, $appointment_id);

        if ($stmt->execute()) {
            echo "<script>alert('Appointment updated successfully.');</script>";
            header("Location: appointments.php"); // Redirect after update
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
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
  <title>Edit Appointment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .d-grid>input {
      width: 100%;
      padding: 10px;
      background-color: #d8c295;
      color: #fff;
      transition: .2s linear;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 20px;
      text-align: center;
    }

    .d-grid>input:hover {
      background-color: #fff;
      color: #d8c295;
      border: 1px solid #d8c295;
      font-weight: bold;
      transition: .2s linear;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center">Edit Appointment</h2>
    <p class="text-center">Modify the details below to update the appointment</p>
    <form action="appointment_edit.php?id=<?php echo $appointment_id; ?>" method="POST" class="p-4 border rounded">

      <!-- Hidden Field for Appointment ID -->
      <input type="hidden" name="appointment_id" value="<?php echo $appointment_id; ?>">

      <!-- User Details -->
      <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $appointment['name']; ?>" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $appointment['email']; ?>" required>
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $appointment['phone']; ?>" required>
      </div>

      <!-- Appointment Details -->
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="date" class="form-label">Appointment Date</label>
          <input type="date" class="form-control" id="date" name="date" value="<?php echo $appointment['appointment_date']; ?>" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="time" class="form-label">Preferred Time</label>
          <input type="time" class="form-control" id="time" name="time" value="<?php echo $appointment['appointment_time']; ?>" required>
        </div>
      </div>

      <!-- Service Selection with Price Display -->
      <div class="mb-3">
        <label for="service" class="form-label">Select Service</label>
        <select class="form-select" id="service" name="service" required onchange="displayPrice()">
          <option disabled value="">Choose a service...</option>
          <option value="Haircut" <?php echo ($appointment['service'] == 'Haircut') ? 'selected' : ''; ?>>Haircut</option>
          <option value="Hair Coloring" <?php echo ($appointment['service'] == 'Hair Coloring') ? 'selected' : ''; ?>>Hair Coloring</option>
          <option value="Manicure" <?php echo ($appointment['service'] == 'Manicure') ? 'selected' : ''; ?>>Manicure</option>
          <option value="Pedicure" <?php echo ($appointment['service'] == 'Pedicure') ? 'selected' : ''; ?>>Pedicure</option>
          <option value="Facial" <?php echo ($appointment['service'] == 'Facial') ? 'selected' : ''; ?>>Facial</option>
          <option value="Massage" <?php echo ($appointment['service'] == 'Massage') ? 'selected' : ''; ?>>Massage</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="price" class="form-label">Service Price</label>
        $<input type="number" class="form-control" id="price" name="price" value="<?php echo $appointment['service_price']; ?>" readonly>
      </div>

      <div class="mb-3">
        <label for="notes" class="form-label">Additional Notes</label>
        <textarea class="form-control" id="notes" name="notes" rows="3"><?php echo $appointment['notes']; ?></textarea>
      </div>

      <!-- Submit Button -->
      <div class="d-grid">
        <input type="submit" name="submit_appointment" class="btn btn-primary" value="Update Appointment">
      </div>
    </form>
  </div>

  <script>
    const servicePrices = {
      "Haircut": 30,
      "Hair Coloring": 80,
      "Manicure": 25,
      "Pedicure": 35,
      "Facial": 50,
      "Massage": 60
    };

    function displayPrice() {
      const serviceSelect = document.getElementById("service");
      const priceInput = document.getElementById("price");
      const selectedService = serviceSelect.value;
      priceInput.value = servicePrices[selectedService] || "";
    }
  </script>
</body>
</html>


