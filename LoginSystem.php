<?php
    // session_start();
    include("./Assets/config.php"); //connection to database and some test functions
    include("./Assets/header.php"); //insert to bootstrap and other java scripts

    

    $username = $password = $telephone = $email = "";
    $username_err = $password_err = $tel_err = $email_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        prettyprint($_POST);
    }
?>

<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Login</h5>
          <!-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Register</button> -->
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
  <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Registreer</h5>
          <!-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button> -->
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="form-horizontal" method=post action="" autocomplete="off">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="Name-name" class="col-form-label">Naam:</label>
                    <input type="text" required name="name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="email-name" class="col-form-label">Email:</label>
                    <input type="email" required name="Email" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="email-name" class="col-form-label">Password:</label>
                    <input type="password" required name="Password" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="tel-name" class="col-form-label">Telefoonnummer:</label>
                    <input type="tel" required name="phone" pattern="[0-9]{10}" class="form-control" />
                </div>
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col">
                        <div class="mb-3">
                            <label for="email-name" class="col-form-label">Adress:</label>
                            <input type="text" class="form-control" required name="Adress"/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="email-name" class="col-form-label">Postcode:</label>
                            <input type="text" class="form-control" required name="Postcode" pattern="[0-9]{4}[A-Z]{2}"/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="email-name" class="col-form-label">Plaats:</label>
                            <input type="text" class="form-control" required name="Plaats"/>
                        </div>
                    </div>
                </div>
                <input type="hidden" value="Regist" name="Type">
            </div>
            <div class="modal-footer">
                <button type="submit" value="Submit" name="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">LOGIN FORM</button>
  <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">REGISTER FORM</button>
