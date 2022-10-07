<?php
    include("./Assets/Config.php"); //connection to database and some test functions
    include("./Assets/Header.php"); //connection Styling
?>

<body>
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container" style="">
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
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="">Lees meer</a>
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
                    <h4 class="text-light mb-4">Andere websites</h4>
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
</body>

</html>