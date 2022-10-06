<?php
    
    include("../Assets/config.php"); //connection to database and some test functions
    include("../Assets/header.php"); //insert to bootstrap and other java scripts

    session_start();

    $username       = $password         = $telephone    = $email        = $adress       = $place        = $postalcode       = "";
    $username_err   = $password_err     = $tel_err      = $email_err    = $adress_err   = $place_err    = $postalcode_err   = "";
    	
    prettyprint($_POST); //Echo ALL
    prettyprint($_SESSION); //Echo ALL
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST['Type'] == "Regist"){
            //Register Code
            
            //Name Checker!
            if(empty(trim($_POST["name"]))){
                $username_err = "Vul aub een naam in";
            }elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["name"]))){
                $username_err = "Namen kunnen alleen maar bestaan uit letters, cijfers!";
            }else{
                $username = trim($_POST["name"]);
            }

            //EMAIL Checker!
            if(empty(trim($_POST["Email"]))){
                $email_err = "Please enter a email.";
            } else{
                // Prepare a select statement
                $sql = "SELECT id FROM klanten WHERE Email = ?";
                
                if($stmt = mysqli_prepare($link, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_email);
                    
                    // Set parameters
                    $param_email = trim($_POST["Email"]);
                    
                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        /* store result */
                        mysqli_stmt_store_result($stmt);

                        if(mysqli_stmt_num_rows($stmt) == 1){
                            $email_err = "This email is already taken.";
                        } else{
                            $email = $_POST["Email"];
                        }
                    } else{
                        $email_err = "Oops! Something went wrong. Please try again later.";
                    }
        
                    // Close statement
                    mysqli_stmt_close($stmt);
                }
            }

            //Check Password!
            if(empty(trim($_POST["Password"]))){
                $password_err = "Please enter a password.";     
            } elseif(strlen(trim($_POST["Password"])) < 6){
                $password_err = "Password must have atleast 6 characters.";
            } else{
                $password = trim($_POST["Password"]);
            }

            //CHECK Phone Nr!
            if(empty(trim($_POST["phone"]))){
                $tel_err = "Please enter a phone number.";
            }else{
                $telephone = trim($_POST["phone"]);
            }

            //CHECK Adress!
            if(empty(trim($_POST["Adress"]))){
                $adress_err = "Please enter a Adress.";
            }else{
                $adress = trim($_POST["Adress"]);
            }

            //CHECK Postcode!
            if(empty(trim($_POST["Postcode"]))){
                $postalcode_err = "Please enter";
            }else{
                $postalcode = trim($_POST["Postcode"]);
            }

            //CHECK Plaats!
            if(empty(trim($_POST["Plaats"]))){
                $place_err = "Please enter";
            }else{
                $place = trim($_POST["Plaats"]);
            }


            
            if(empty($username_err) && empty($password_err) && empty($tel_err) && empty($email_err) && empty($adress_err) && empty($place_err) && empty($postalcode_err)){
                
                $sql = "INSERT INTO `klanten` (`ID`, `Naam`, `Email`, `Wachtwoord`, `Telefoonnummer`, `Adres`, `Postcode`, `Plaats`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)";
                if($stmt = mysqli_prepare($link, $sql)){
                    mysqli_stmt_bind_param($stmt, "sssssss", $param_username, $param_email, $param_password, $param_tel, $param_adres, $param_postcode, $param_plaats);
                    
                    $param_username     = $username;
                    $param_email        = $email;
                    $param_password     = password_hash($password, PASSWORD_DEFAULT);
                    $param_tel          = $telephone;
                    $param_adres        = $adress;
                    $param_postcode     = $postalcode;
                    $param_plaats       = $place;

                    if(mysqli_stmt_execute($stmt)){
                        $sql_GetUID = "SELECT `ID` FROM `klanten` WHERE `Email` = ?";
                        
                        if($stmt_USERID = mysqli_prepare($link, $sql_GetUID)){
                            mysqli_stmt_bind_param($stmt_USERID, "s", $email);
                            if(mysqli_stmt_execute($stmt_USERID)){
                                mysqli_stmt_store_result($stmt_USERID);
                                mysqli_stmt_bind_result($stmt_USERID, $id);
                                if(mysqli_stmt_fetch($stmt_USERID)){
                                    $_SESSION["userid"] = $id;
                                    $_SESSION["login"] = "true";
                                    mysqli_stmt_close($stmt_USERID);
                                }   
                            }
                        }
                        
                    }else{
                        PHP_Allert("Oops! Something went wrong. Please try again later.");
                    }

                    // Close statement
                    mysqli_stmt_close($stmt);
                }
                else {
                    if(!empty($username_err)){
                        PHP_Allert($username_err);
                    }
                    if(!empty($password_err)){
                        PHP_Allert($password_err);
                    }
                    if(!empty($tel_err)){
                        PHP_Allert($tel_err);
                    }
                    if(!empty($email_err)){
                        PHP_Allert($email_err);
                    }
                    if(!empty($adress_err)){
                        PHP_Allert($adress_err);
                    }
                    if(!empty($postalcode_err)){
                        PHP_Allert($postalcode_err);
                    }
                    if(!empty($place_err)){
                        PHP_Allert($place_err);
                    }
                }
            }
        }
        elseif ($_POST['Type'] == "Login") {
            if(empty(trim($_POST["Email"]))){
                $email_err = "Please enter username.";
            } else{
                $email = trim($_POST["Email"]);
            }
            if(empty(trim($_POST["Password"]))){
                $password_err = "Please enter your password.";
            } else{
                $password = trim($_POST["Password"]);
            }

            if(empty($email_err) && empty($password_err)){
                $sql = "SELECT ID, Wachtwoord FROM klanten WHERE Email = ?";
                if($stmt = mysqli_prepare($link, $sql)){
                    mysqli_stmt_bind_param($stmt, "s", $param_email);
                    $param_email = $email;
                    if(mysqli_stmt_execute($stmt)){
                        mysqli_stmt_store_result($stmt);
                        if(mysqli_stmt_num_rows($stmt) == 1){
                            mysqli_stmt_bind_result($stmt, $id, $hashed_password);
                            if(mysqli_stmt_fetch($stmt)){
                                if(password_verify($password, $hashed_password)){
                                    $_SESSION["userid"] = $id;
                                    $_SESSION["login"] = "true";
                                }else{
                                    PHP_Allert("Invalid username or password.");
                                }
                            }
                        }else {
                            PHP_Allert("Invalid username or password.");
                        }
                    }
                }
            }

        }else {
            PHP_Allert("The FitnessGram™ Pacer Test is a multistage aerobic capacity test that progressively gets more difficult as it continues. The 20 meter pacer test will begin in 30 seconds. Line up at the start. The running speed starts slowly, but gets faster each minute after you hear this signal. [beep] A single lap should be completed each time you hear this sound. [ding] Remember to run in a straight line, and run as long as possible. The second time you fail to complete a lap before the sound, your test is over. The test will begin on the word start. On your mark, get ready, start.");
        }
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
