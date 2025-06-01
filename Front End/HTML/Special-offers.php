<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegance Salon</title>
    <!-- BootStrap CSS Link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Custom CSS Link  -->
    <link rel="stylesheet" href="../CSS/Style.css">
    <link rel="stylesheet" href="../CSS/SpecialOffers.css">
    <link rel="stylesheet" href="../CSS/Main.css">
    <!-- Font Awesome Link  -->
    <script src="https://use.fontawesome.com/d8c04c32f1.js"></script>
  </head>
<body>
  <div class="container-fluid">
  
    <!-- NavBar Started  -->

    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.html"><img src="Web images/logo.PNG" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="locations.php">Locations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-link" href="index.php#contact-section">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.php">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Special-offers.php">Special Offers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><img style="width: 20px;" src="Web images/user.png" alt="">Login</a>
            </li>
          </ul>
        </div>
      </nav>
      
      <!-- NavBar Ended  -->

    </div>
    <section class="firstSection">
      <div class="card text-white">
        <img src="Web images/offer.PNG" class="card-img" alt="">
      </div>
     </section>
     <section class="secondSectionSo">
      <div>
        <h1>EXCITING SPECIAL OFFERS AND <br> DISCOUNTS</h1>
        <p>Discover exciting salon discounts at Elegance Salon,where beauty meets affordability!  <br>
          Explore a variety of exclusive beauty deals and limited-time salon promotions designed <br>
          to enhance your experience. From rejuvenating facials and luxurious manicures to stylish <br>
          haircuts and revitalizing massages, our hair salon offers let you indulge in premium<br>
          services at exceptional prices. Take advantage of our seasonal  beauty treatment packages<br>
          and monthly salon specials tailored to all your beauty needs. Don’t miss the chance to treat <br>
          yourself with our first-time client offers and loyalty rewards for salons while saving money. <br>
          Check back  often for new discounted spa services and group discounts for salon services, <br>
          and let us help you look and feel your best!</p>
      </div>
     </section>

     <section class="thirdSectionSo">
     <div class="container mt-5">
    <h3 class="text-center">SELECT YOUR LOCATION AND OFFERS</h3>
    <div class="row mt-4">
        <!-- Sidebar Column: Location Buttons -->
        <div class="col-md-3 location-buttons">
            <button class="btn active">DUNDEE OVERGATE SALON</button>
            <button class="btn">DUNDEE OVERGATE KIOSK</button>
            <button class="btn">DUNDEE WELLGATE KIOSK</button>
            <button class="btn">ABERDEEN</button>
            <button class="btn">STIRLING</button>
            <button class="btn">EDINBURGH</button>
        </div>
        
        <!-- Offers Column: Aligned in a Row -->
        <div class="col-md-9">
            
            <!-- Offers Container -->
            <div class="row offers-container">
                <!-- Offer Card 1 -->
                <div class="col-md-4">
                    <div class="offer-card">
                        <img src="path/to/brow-lamination.jpg" alt="Brow Lamination">
                        <h5 class="mt-3">Brow Lamination</h5>
                        <p>Achieve flawlessly groomed, fuller-looking brows with our Brow Lamination treatment. This process smooths and shapes brow hairs, giving them a lifted, voluminous effect that lasts up to eight weeks.</p>
                        <button class="btn btn-book w-100">BOOK NOW</button>
                        <div class="price-section">Was - 37.99<br>Now - 29.99<br>SAVE £8</div>
                    </div>
                </div>
                
                <!-- Offer Card 2 -->
                <div class="col-md-4">
                    <div class="offer-card">
                        <img src="path/to/henna-brows.jpg" alt="Henna Brows">
                        <h5 class="mt-3">Henna Brows</h5>
                        <p>Enhance your brows with our Henna Brow treatment – a natural, semi-permanent tint that beautifully defines and fills in sparse brows for up to six weeks.</p>
                        <button class="btn btn-book w-100">BOOK NOW</button>
                        <div class="price-section">Was - 34.99<br>Now - 27.99<br>SAVE £7</div>
                    </div>
                </div>
                
                <!-- Offer Card 3 -->
                <div class="col-md-4">
                    <div class="offer-card">
                        <img src="path/to/brow-thread-tint.jpg" alt="Brow Thread & Tint">
                        <h5 class="mt-3">Brow Thread & Tint</h5>
                        <p>Get perfectly shaped and defined brows with our Brow Thread & Tint treatment. This service combines precise threading to shape your brows and a tint to add depth and color.</p>
                        <button class="btn btn-book w-100">BOOK NOW</button>
                        <div class="price-section">Was - 25.98<br>Now - 23.99<br>SAVE £2</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
     </section>
</body>
</html>