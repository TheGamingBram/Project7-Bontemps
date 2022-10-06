<?php 
    include("../Assets/config.php"); //connection to database and some test functions
    include("../Assets/header.php"); //insert to bootstrap and other java scripts

    session_start();

    prettyprint($_SESSION);
    if($_SESSION["login"] == "true" && isset($_SESSION['userid'])){
        $sql = "SELECT Naam, Email, Telefoonnummer, Adres, Postcode, Plaats FROM klanten WHERE ID = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_id);
            $param_id = $_SESSION['userid'];
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt, $username, $email, $Telefoonnummer, $adress, $postcode, $plaats);
                if(mysqli_stmt_fetch($stmt)){

                }
            }
        }
    }else {
        header("location: index.php");
    }
?>