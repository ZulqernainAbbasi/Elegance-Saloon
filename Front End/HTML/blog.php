<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spooktacular Halloween Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/Style.css">
    <link rel="stylesheet" href="../CSS/Main.css">
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
            <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
          </li>
          <li class="nav-item">
              <a class="nav-link" id="about-link" href="index.php#about-section">About Us</a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="locations.php">Locations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"id="contact-link" href="index.php#contact-section">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog.php">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><img style="width: 20px;" src="Web images/user.png" alt="">Login</a>
          </li>
        </ul>
      </div>
    </nav>
    
    <!-- NavBar Ended  -->

  </div>
    <div class="container my-5">
        <!-- All Posts Section -->
        <div class="text-start mb-3">
            <h5>All Posts</h5>
        </div>

        <!-- Blog Post Card -->
        <div class="card mb-4">
            <div class="row g-0">
                <!-- Image Section -->
                <div class="col-md-4">
                    <img src="web images/blog.PNG" alt="Spooky Halloween Makeup" class="img-fluid rounded-start">
                </div>
                
                <!-- Text Content Section -->
                <div class="col-md-6">
                    <div class="card-body">
                    <p class="card-text">
                            <small class="text-muted"><i class="fa-solid fa-user"></i>Accounts Elegance</small><br>
                            <small class="text-muted">Oct 28 · 2 min read</small>
                        </p>
                        <h5 class="card-title">Spooktacular Halloween Style Nail Art at Elegance Salon</h5>
                        <p class="card-text">
                            As Halloween approaches, it’s time to unleash your creativity and embrace the spooky spirit! At Elegance Salon, we offer an array of...
                        </p>
                        <!-- Interaction Section -->
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">7 views · 0 comments</small>
                            <a href="#" class="text-decoration-none text-danger"><i class="bi bi-heart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Icons (optional for heart icon) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
