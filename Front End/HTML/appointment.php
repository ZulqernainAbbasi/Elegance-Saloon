<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Salon Appointment Form</title>
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
      color:  #d8c295;
      border: 1px solid #d8c295;
      font-weight: bold;
      transition: .2s linear;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center">Book an Appointment</h2>
    <p class="text-center">Fill in the form below to book an appointment at our salon</p>
    <form action="../../Back End/appointment_process.php" method="POST" class="p-4 border rounded">
      
      <!-- User Details -->
      <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" required>
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
      </div>

      <!-- Appointment Details -->
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="date" class="form-label">Appointment Date</label>
          <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="time" class="form-label">Preferred Time</label>
          <input type="time" class="form-control" id="time" name="time" required>
        </div>
      </div>

      <!-- Service Selection with Price Display -->
      <div class="mb-3">
        <label for="service" class="form-label">Select Service</label>
        <select class="form-select" id="service" name="service" required onchange="displayPrice()">
          <option selected disabled value="">Choose a service...</option>
          <option value="Haircut">Haircut</option>
          <option value="Hair Coloring">Hair Coloring</option>
          <option value="Manicure">Manicure</option>
          <option value="Pedicure">Pedicure</option>
          <option value="Facial">Facial</option>
          <option value="Massage">Massage</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="price" class="form-label">Service Price</label>
        $<input type="number" class="form-control" id="price" name="price" readonly>
      </div>

      <div class="mb-3">
        <label for="notes" class="form-label">Additional Notes</label>
        <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Any special requests?"></textarea>
      </div>

      <!-- Submit Button -->
      <div class="d-grid">
        <input type="submit" name="submit_appointment" class="btn btn-primary" value="Book Appointment">
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <script>
    // Define prices for each service
    const servicePrices = {
      "Haircut": 30,
      "Hair Coloring": 80,
      "Manicure": 25,
      "Pedicure": 35,
      "Facial": 50,
      "Massage": 60
    };

    // Function to display the price based on selected service
    function displayPrice() {
      const serviceSelect = document.getElementById("service");
      const priceInput = document.getElementById("price");
      const selectedService = serviceSelect.value;
      priceInput.value = servicePrices[selectedService] || ""; // Update price or clear field
    }
  </script>
</body>
</html>
