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

<!-- Header -->
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
                        <button data-bs-target="#exampleModalToggle" data-bs-toggle="modal" class="dropdown-item">Inloggen</button>
                        <a class="dropdown-item">Registeren</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Header End -->

<!-- Inlog & Registreer Modal -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="form-horizontal" method=post action="" autocomplete="off">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="email-name" class="col-form-label">Email:</label>
                    <input type="email"  required name="Email" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label for="email-name" class="col-form-label">Password:</label>
                    <input type="password" required name="Password" class="form-control" />
                </div>
                <input type="hidden" value="Login" name="Type">
            </div>
            <div class="modal-footer">
                <button type="submit" value="Submit" name="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
</div>
<!-- Inlog & Registreer Modal END -->

<!-- Spacer -->
<div style="margin-top: 150px"></div>