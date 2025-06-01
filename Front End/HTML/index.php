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
              <a class="nav-link" id="about-link" href="#about-section">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="locations.php">Locations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-link" href="#contact-section">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.php">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php"><img style="width: 20px;" src="Web images/user.png" alt="">Login</a>
            </li>
          </ul>
        </div>
      </nav>
      
      <!-- NavBar Ended  -->

    </div>

    <!-- Section One Started-->
     <section class="firstSection">
      <div class="card text-white">
        <img src="Web images/Section_1_img.PNG" class="card-img" alt="">
        <div class="card-img-overlay">
          <h1 class="card-title"><span id="element_1"></span><br></h1>
          <p class="card-text"><span id="element_2"></span></p>
        </div>
      </div>
     </section>
    <!-- Section One Ended-->

    <!-- Section Two Started-->
     <section class="secondSection">
      <div class="text">
        <h1>Elegance Salons</h1>
        <p>Established in 2010, Elegance is a multi-award-winning and leading beauty chain, rated highly in <br> Scotland</p>
      </div>
      <div class="container">
          <div class="row text-center align-items-center ">
              <div class="col">
                  <a href="locations.php"><img src="Web images/I1.PNG" alt=""></a>
                  <p class="text_1">Find a salon</p>
                  <p class="text_2">Choose Your Salon to Book an Appointment</p>
              </div>
              <div class="col">
                  <a href="#"><img src="Web images/I2.PNG" alt=""></a>
                  <p class="text_1">Gift cards</p>
                  <p class="text_2">Perfect Gifts for Any Occasion</p>
              </div>
              <div class="col">
                  <a href="#"><img src="Web images/I3.PNG" alt=""></a>
                  <p class="text_1">Products</p>
                  <p class="text_2">Shop Our Products</p>
              </div>
              <div class="col">
                  <a href="#"><img src="Web images/I4.PNG" alt=""></a>
                  <p class="text_1">Learn with us</p>
                  <p class="text_2">Nurturing Your Skills in Beauty</p>
              </div>
          </div>
      </div>
     </section>
     <!-- Section Two Ended-->

     <!-- Section Three Started  -->
     <section class="thirdSection">
      <div class="content">
        <p class="headline">We’re Coming to You – Enjoy Salon <br> Perfection Without Leaving Home!</p>
        <div class="car-image">
          <img src="Web images/car.png" alt="Car with Elegance@Home logo">
        </div>
        <h2 class="main-title">ELEGANCE@HOME</h2>
        <div class="info-section">
          <div class="benefits">
            <h3>Benefits</h3>
            <ul>
              <li>Convenience and Time-Saving</li>
              <li>Personalized Services</li>
              <li>High-Quality Services</li>
              <li>Comfort of Home</li>
              <li>Ideal for Special Occasions</li>
              <li>Enhanced Privacy</li>
            </ul>
          </div>
          <div class="who-we-serve">
            <h3>Who we Serve</h3>
            <ul>
              <li>Busy Professionals</li>
              <li>Stay at Home Parents</li>
              <li>Work at Home Professionals</li>
              <li>Care Homes</li>
              <li>Senior Citizens</li>
              <li>Mobility Impaired Patients</li>
            </ul>
          </div>
        </div>
        <button type="button" class="read-more btn btn-outline-secondary">READ MORE</button>
      </div>
    </section>
    <!-- Section three Ended  -->

    <!-- Section Four Started  -->
     <section class="fourthSection">
      <div class="row">
        <div class="col-sm"><img src="Web images/google.PNG" alt=""></div>
        <div class="col-sm"><img src="Web images/facebook.PNG" alt=""></div>
        <div class="col-sm"><img src="Web images/zenoti.PNG" alt=""></div>
      </div>
     </section>
     <!-- Section Four Ended  -->

     <!-- Section Fifth Started  -->
      <section class="fifthSection">
        <div class="text">
          <p>Multi-Award winning salon</p>
          <h1>Our Awards</h1>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="Web images/Awards_1.PNG" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="Web images/Awards_2.PNG" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="Web images/Award_3.PNG" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
      </section>
      <!-- Section fifth Ended  -->
      
      <!-- section sixth Started  -->
      <section class="sixthSection my-5">
        <h2 class="section-heading text-center">Our Services</h2>
        
        <div id="servicesCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="container d-flex justify-content-around">
                        <div>
                            <div class="service-title">Chemical Peels</div>
                            <ul class="service-list">
                                <li>Face</li>
                                <li>Underarm</li>
                                <li>Neck</li>
                                <li>Arm</li>
                            </ul>
                        </div>
                        <div>
                            <div class="service-title">Laser Skin Treatments</div>
                            <ul class="service-list">
                                <li>Skin Pigment Removal</li>
                                <li>Red Vein Removal</li>
                                <li>Skin Re-surfacing</li>
                                <li>Acne Treatment</li>
                            </ul>
                        </div>
                        <div>
                            <div class="service-title">Facial Treatments</div>
                            <ul class="service-list">
                                <li>Anti-Aging Facial</li>
                                <li>Hydrating Facial</li>
                                <li>Brightening Facial</li>
                                <li>Acne Facial</li>
                            </ul>
                        </div>
                        <div>
                            <div class="service-title">Body Treatments</div>
                            <ul class="service-list">
                                <li>Body Scrub</li>
                                <li>Body Wrap</li>
                                <li>Cellulite Reduction</li>
                                <li>Detox Treatment</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="container d-flex justify-content-around">
                        <div>
                            <div class="service-title">Massages</div>
                            <ul class="service-list">
                                <li>Indian Head Massage</li>
                                <li>Back, Neck, & Shoulder Massage</li>
                                <li>Full Body Massage</li>
                                <li>Aroma Therapy Massage</li>
                            </ul>
                        </div>
                        <div>
                            <div class="service-title">Gents Cuts & Grooming</div>
                            <ul class="service-list">
                                <li>Gents Cut & Styling</li>
                                <li>Gents Skin Fade</li>
                                <li>Beard Trim & Shave</li>
                                <li>Junior Cut & Styling</li>
                            </ul>
                        </div>
                        <div>
                            <div class="service-title">Nail Services</div>
                            <ul class="service-list">
                                <li>Manicure</li>
                                <li>Pedicure</li>
                                <li>Gel Nails</li>
                                <li>Acrylic Nails</li>
                            </ul>
                        </div>
                        <div>
                            <div class="service-title">Waxing</div>
                            <ul class="service-list">
                                <li>Legs</li>
                                <li>Arms</li>
                                <li>Underarm</li>
                                <li>Bikini</li>
                            </ul>
                        </div>
                    </div>
                </div>
    
                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="container d-flex justify-content-around">
                        <div>
                            <div class="service-title">Additional Services</div>
                            <ul class="service-list">
                                <li>Tattoo Removal</li>
                                <li>Stretch Mark Removal</li>
                                <li>Back Treatment</li>
                                <li>Facial Treatments</li>
                            </ul>
                        </div>
                        <div>
                            <div class="service-title">Special Offers</div>
                            <ul class="service-list">
                                <li>Seasonal Packages</li>
                                <li>Membership Discounts</li>
                                <li>Referral Bonuses</li>
                                <li>Loyalty Program</li>
                            </ul>
                        </div>
                        <div>
                            <div class="service-title">Gift Vouchers</div>
                            <ul class="service-list">
                                <li>Custom Amounts</li>
                                <li>Holiday Specials</li>
                                <li>Birthday Packages</li>
                                <li>Special Occasions</li>
                            </ul>
                        </div>
                        <div>
                            <div class="service-title">Consultations</div>
                            <ul class="service-list">
                                <li>Skin Analysis</li>
                                <li>Personalized Plans</li>
                                <li>Product Recommendations</li>
                                <li>Follow-Up Sessions</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-target="#servicesCarousel" data-slide="prev">
                <span class="custom-arrow left-arrow" aria-hidden="true">&#9664;</span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#servicesCarousel" data-slide="next">
                <span class="custom-arrow right-arrow" aria-hidden="true">&#9654;</span>
                <span class="sr-only">Next</span>
            </button>
    
            <!-- Carousel Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-target="#servicesCarousel" data-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-target="#servicesCarousel" data-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-target="#servicesCarousel" data-slide-to="2" aria-label="Slide 3"></button>
            </div>
        </div>
    </section>
      <!-- section sixth Ended  -->

      <!-- section seventh Started  -->
      <section class="seventhSection">
        <div class="text-center my-5">
          <h2><span id="element_3"></span></h2>
            <div class="container">
              <div class="row row-cols-4">
                  <div class="col">
                      <div class="img-container">
                          <a href="#"><img class="zoom-img" src="Web images/nc.PNG" alt=""></a>
                      </div>
                  </div>
                  <div class="col">
                      <div class="img-container">
                          <a href="#"><img class="zoom-img" src="Web images/hc.PNG" alt=""></a>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="img-container" style="width: 400px; height: 360px;">
                          <a href="#"><img class="zoom-img" src="Web images/m+s.PNG" alt=""></a>
                      </div>
                  </div>
              </div>
          </div>
          
          <div class="container">
              <div class="row row-cols-4">
                  <div class="col">
                      <div class="img-container">
                          <a href="#"><img style="height: 235px;" class="zoom-img" src="Web images/osmo.PNG" alt=""></a>
                      </div>
                  </div>
                  <div class="col">
                      <div class="img-container" style="height: 235px;">
                          <a href="#"><img class="zoom-img" src="Web images/bc.PNG" alt=""></a>
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="img-container" style="width: 400px; height: 235px;">
                      <a href="#"><img class="zoom-img" src="Web images/olaaaa.webp" alt=""></a>
                    </div>
                </div>
              </div>
          </div>
      </section>

      <!-- Section Seventh Ended  -->

       <!-- Section Eight Started  -->
       <section class="eightSection">
        <div class="text">
          <h1 class="heading">Discounts and Cashback</h1>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
                <img style="width: 500px; height: 400px;" src="Web images/stddis.PNG" class="d-block w-100" alt="...">
                <div class="text">
                  <h1>10% + 5% <span>Cashback</span></h1>
                </div>
              </div>
            <div class="carousel-item">
              <img style="width: 500px; height: 400px;" src="Web images/nhsdis.PNG" class="d-block w-100" alt="...">
              <div class="text">
                <h1>10% + 5% <span>Cashback</span></h1>
              </div>
            </div>
            <div class="carousel-item">
              <img style="width: 500px; height: 400px;" src="Web images/pendis.PNG" class="d-block w-100" alt="...">
              <div class="text">
                <h1>10% + 5% <span>Cashback</span></h1>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Section eight Ended  -->

      <section id="about-section" class="sectionNinth">
        <div>
          <h1 id="element_4"></h1>
        </div>
        <div><p>Recently crowned ‘The National Beauty Group of the Year’ and multi award - winning beauty brand Elegance opened their first branch in 2010 with a clear vision to be a one stop destination for beauty services and to fill a niche in the market. Elegance now has 7 salons in Scotland with a client base of 221,000. The brand has grown from strength to strength in this heavily competitive industry under the leadership of a born entrepreneur Babeesh Kannam Velly and through its over 60 highly skilled team, delivering exceptional levels of customer experience and satisfaction.</p>
        </div>
        <div><p>We have further expansion plans from next year onwards and to continue to grow our brand in prestigious locations throughout the UK.</p>
        </div>
        <div><pre>“Continous staff training and empowerment are key elements in the company’s <br> growth and development. We thrive on client satisfaction.”</pre>
        </div>
      </section>

      <section id="contact-section" class="tenthSection">
        <div class="contact-section">
          <div class="contact-info">
              <h2>Get in Touch</h2>
              <a href="mailto:hello@elegancesalons.co.uk">hello@elegancesalons.co.uk</a>
              <div class="social-icons">
                  <a href="#"><img style="width: 22px;" src="Web images/facebook-icon.png" alt="Facebook"></a>
                  <a href="#"><img style="width: 30px;" src="Web images/instagram-icon.png" alt="Instagram"></a>
              </div>
              <div class="locations">
                <div class="row_1">
                  <div class="location">Dundee<br>01382202313</div>
                  <div class="location">Aberdeen<br>01224502322</div>
                  <div class="location">Stirling<br>01786437227</div>
                </div>
                <div class="row_2">
                  <div class="location">Glasgow<br>01413702249</div>
                  <div class="location">Edinburgh<br>01312857052</div>
                </div>
              </div>
          </div>
      
          <div class="contact-form">
              <form action="../../Back End/Main.php" method="POST">
                  <div class="form-group">
                      <label for="first-name">First Name</label>
                      <input type="text" id="first-name" name="first_name">
                  </div>
                  <div class="form-group">
                      <label for="last-name">Last Name</label>
                      <input type="text" id="last-name" name="last_name">
                  </div>
                  <div class="form-group full-width">
                      <label for="email">Email *</label>
                      <input type="email" id="email" name="email" required>
                  </div>
                  <div class="form-group full-width">
                      <label for="message">Message</label>
                      <textarea id="message" name="message" rows="4"></textarea>
                  </div>
                  <input name="submit" value="Send" type="submit" class="submit-btn"></input>
              </form>
          </div>
      </div>
      
      </section>  
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="../JS/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  
  </body>
</html>

<?php
if(isset($_REQUEST['msg']))

{
    $message = $_REQUEST['msg'];
    ?>   <script> alert("<?php echo $message;  ?>")</script>  <?php
}