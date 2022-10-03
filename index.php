<?php
    include("./Assets/config.php"); //connection to database and some test functions
    include("./Assets/header.php"); //insert to bootstrap and other java scripts
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 
    
    <!-- Libraries Stylesheet -->
    <link href="Assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="Assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="Assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn bg-white shadow" data-wow-delay="0.1s">
        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="./" class="navbar-brand ms-4 ms-lg-0">
            <div class="header-img"></div>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="about.html" class="nav-item nav-link">About Us</a>
                    <a href="product.html" class="nav-item nav-link">Products</a>
                    <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                </div>

                <div class="d-none d-lg-flex ms-2">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <div class="fa fa-user text-body"></div>
                        </a>
                        <div class="dropdown-menu m-0">
                            <a href="" class="dropdown-item">Inloggen</a>
                            <a href="" class="dropdown-item">Uitloggen</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container" style="margin-top: 150px">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="Assets/img/voorkant-foto.jpeg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-5 mb-4">Bon Temps</h1>
                    <p class="mb-4">Een leuk restaurant waar je lekker kan eten</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Gezelligheid</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Gastvrijheid</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Lekker eten</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-fluid bg-light bg-icon my-5 py-6">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Onze menu's</h1>
                <p>Hier vind u onze verschillende soorten menu's waar u uit kunt kiezen.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="Assets/img/koe-foto.png" alt="Vlees foto">
                        <h4 class="mb-3">Vlees</h4>
                        <p class="mb-4">Zoals echte mannen vlees eten serveren wij ook vlees. Een lekker mals stukkie</p>
                        <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Meer info</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="Assets/img/visje.png" alt="Vis foto">
                        <h4 class="mb-3">Vis</h4>
                        <p class="mb-4">Ja mensen eten ook vis. Dus dan doen wij er ook maar vis bij.</p>
                        <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Meer info</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="Assets/img/icon-1.png" alt="Vegan foto">
                        <h4 class="mb-3">Vegetarisch</h4>
                        <p class="mb-4">Ook wij serveren vegetetarisch eten. Eet gewoon vlees.</p>
                        <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Meer info</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    
                    <p>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p><i class="fa fa-map-marker-alt me-3"></i>Janstraat 7, Cuijk, NL</p>
                    <p><i class="fa fa-phone-alt me-3"></i><a href=tel:+31612345678>+31 6 12345678</a></p>
                    <p><i class="fa fa-envelope me-3"></i><a href=mail:info@bontemps.nl>info@example.com</a></p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Menu</a>
                    <a class="btn btn-link" href="">Tafel overzicht</a>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="./">Bon Temps</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        Designed By <a href="./">Jovey Smits, Bram Hesen, Xander</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- JavaScript Libraries -->
    <script src="Assets/lib/wow/wow.min.js"></script>
    <script src="Assets/lib/easing/easing.min.js"></script>
    <script src="Assets/lib/waypoints/waypoints.min.js"></script>
    <script src="Assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="Assets/js/main.js"></script>
</body>

</html>