<?php 
    include("./Assets/Config.php"); //connection to database and some test functions
    

    
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
                mysqli_stmt_close($stmt);
            }
        }
    }else {
        header("location: index.php");
    }


    if(isset($_POST['DelAccount'])){
        if($_POST['DelID'] == $_SESSION['userid']){
            $sql = "DELETE FROM `klanten` WHERE `klanten`.`ID` = ?";
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_id);
                $param_id = $_POST['DelID'];
                if(mysqli_stmt_execute($stmt)){
                    session_destroy();
                    header("location: index.php");
                }else{
                    PHP_Allert("Account is niet verwijderdt");
                }
            }
        }else {
            PHP_Allert("Account is niet verwijderdt");
        }
    }

    include("./Assets/Header.php"); //connection Stylings
?>

<div class="container-fluid">

                    <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Account Beheer</h4>
        </div>
     </div>
    <div class="col-12">                         
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Algemene Informatie</h5>
                        <hr>
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" disabled="" value="<?= $email?>">
                        <hr>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DELUSERWARNING">Verwijder account</button>
                    </div>
                </div>
            </div>
          <!-- <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Aanpasbare Informatie</h5>
                    <hr>
                    <form method="post">
                        <label class="form-label">Gebruikers Naam</label>
                        <input required="" type="text" class="form-control" name="naam" value="TMPTEST">
                        <label class="form-label">Telefoonnummer</label>
                        <input required="" name="phone" class="form-control" type="tel" value="1234567890" pattern="[0-9]{10}">
                        <hr>
                        <input type="hidden" value="true" name="UpdateUserInfo">
                        <input type="hidden" value="14" name="ID">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
          </div> -->
    </div>
</div>



<!-- Modal Body -->
<div class="modal fade" id="DELUSERWARNING" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="true" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Weet u het zeker?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sluiten</button>
                    <input type="hidden" value="<?= $_SESSION['userid']?>" name="DelID">
                    <input type="hidden" value="true" name="DelAccount">
                    <button type="submit" class="btn btn-danger">Verwijder account</button>
                </div>
            </form>
        </div>
    </div>
</div>

