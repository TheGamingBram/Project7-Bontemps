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

    $username       = $password         = $telephone    = $email        = $adress       = $place        = $postalcode       = "";
    $username_err   = $password_err     = $tel_err      = $email_err    = $adress_err   = $place_err    = $postalcode_err   = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['Type'])){
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
    
            }elseif ($_POST['Type'] == "Logout") {
                session_destroy();
            }else{

            }
        }
    }
    

    if(isset($_GET['Logout'])){
        if($_GET['Logout'] == "logout"){
            session_destroy();
            header("location: index.php");
        }
    }
?>