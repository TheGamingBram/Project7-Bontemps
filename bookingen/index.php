<?php 
    //session start
    session_start();

    //voegt de benodigde bestanden toe
    include('../Assets/Config.php');
    include('../Assets/Header.php');
    // include('../header.php');
    include('../Assets/Checklogin.php');

    $_SESSION['userid'] = "5";
    $_SESSION['HumanClass'] = false;


    $KlantID = $_SESSION['userid'];
    if(!$_SESSION['HumanClass'])
    {
        $QueryBooking = "SELECT Datum, Aantal, Klanten_ID AS KlantenID, Tafel_ID AS TafelID FROM reserveringen WHERE Klanten_ID = '$KlantID'";
    }
    else
    {
        $QueryBooking = "SELECT Datum, Aantal, Klanten_ID AS KlantenID, Tafel_ID AS TafelID FROM reserveringen";
    }

    $resultBooking=$con->query($QueryBooking);
    if($stmt = mysqli_prepare($con, $QueryBooking)){
        $varBooking = "";
       while($rowBooking = $resultBooking->fetch_assoc())
       {
        if($rowBooking != NULL)
        {   
            $Datum = $rowBooking['Datum'];
            $Aantal = $rowBooking['Aantal'];
            $KlantID = $rowBooking['KlantenID'];
            $TafelID = $rowBooking['TafelID'];

            $Queryklanten = "SELECT Naam FROM klanten WHERE ID = '$KlantID'";
            $resultklanten=$con->query($Queryklanten);
            if($stmt = mysqli_prepare($con, $Queryklanten)){
               while($rowklanten = $resultklanten->fetch_assoc())
               {
                if($rowklanten != NULL)
                {
                    $KlantNaam = $rowklanten['Naam'];
                }
               }
            }

            $varBooking .= "<tr> <td>$Aantal</td> <td>$KlantNaam</td>";
            $varBooking .= "<td>$TafelID</td> <td>$Datum</td>";
            $varBooking .= "<td> <button class='fa-regular fa-pen'></button> <button class='fa-regular fa-trash'></button></td> </tr>";
        }
       }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <div class="card my-4">
            <div class="card-header">
                 <div class="row justify-content-between">
                        <div class="col-auto">
                            <div class="card-title">
                                <h1>Booking overzicht</h1>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="booking.php" class="btn btn-success"> 
                                    Booking plaatsen
                                    </a>
                                </div>
                            </div>
                        </div> 
                    </div>
            </div>
            <div class="card-body">
                <table id="bookingenTable" class="display">
                    <thead>
                        <tr>
                            <th>Aantal persoonen</th>
                            <th>Gast</th>
                            <th>Tafel</th>
                            <th>Datum</th>
                            <th>Akties</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            echo $varBooking;
                        ?>
                    </tbody>
                </table>
            </div> 
        </div> 
    </div>
</body>




<script>
    $(document).ready( function () {
        $('#bookingenTable').DataTable({
            "ordering": false,
            "info":     false
        });
    } );
</script>