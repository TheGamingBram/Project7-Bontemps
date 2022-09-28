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

<!-- Navbar Start -->
<div class="container-fluid fixed-top px-0 wow fadeIn bg-white shadow" data-wow-delay="0.1s">
        <!-- <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>info@example.com</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Follow us:</small>
                <a class="text-body ms-3" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-twitter"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div> -->

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