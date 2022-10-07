<?php
    session_start();

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'bontemps');
    define('DB_USER','root');
    define('DB_PASS' ,'');

    /* Attempt to connect to MySQL database */
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    
    /* Check connection */
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    function prettyprint($arr){ //prettyprint 
        echo '<pre>';           // Kan Verwijderd worden
            print_r($arr);
        echo '</pre>';
    }

    function PHP_Allert($msg){
        echo '<script>alert("'.$msg.'")</script>';
    }

    
?>

<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Bon Temps</title>

    <link rel="icon" type="image/png" href="./Assets/img/bontempslogo.png">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.0/css/all.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Links for DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script   script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    <link href="Assets/css/style.css" rel="stylesheet">
</head>

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
                    <a href="about.html" class="nav-item nav-link">Over ons</a>
                    <a href="product.html" class="nav-item nav-link">Product</a>
                    <a href="contact.php" class="nav-item nav-link">Contact gegevens</a>
                </div>

                <div class="d-none d-lg-flex ms-2">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <div class="fa fa-user text-body"></div>
                        </a>
                        <div class="dropdown-menu m-0">
                            <a href="" class="dropdown-item">Inloggen</a>
                            <a href="" class="dropdown-item">Registeren</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
</div>

<div style="margin-top: 150px"></div>