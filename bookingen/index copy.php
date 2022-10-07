<?php 
    //voegt de benodigde bestanden toe
    include('../Assets/Config.php');
    include('../Assets/Checklogin.php');
    include('Booking.php');
    
    $_SESSION['HumanClass'] = false;
    if(isset($_REQUEST['action']))
    {
        if($_REQUEST['action'] == "edit")
        {
    
        }
        if($_REQUEST['action'] == "delete")
        {
            Booking::delete($_REQUEST['booking']);
        //    $BookingID = $_REQUEST['booking'];
        //     $DelQueryBooking = "DELETE FROM reserveringen WHERE ID = '$BookingID'";
        //     $DeleteBooking=$con->query($DelQueryBooking);
    
            header("location: index.php");
        }
    }


    $KlantID = $_SESSION['userid'];
    if(!$_SESSION['HumanClass'])
    {
        $QueryBooking = "SELECT ID, Datum, Aantal, Klanten_ID AS KlantenID, Tafel_ID AS TafelID FROM reserveringen WHERE Klanten_ID = '$KlantID'";
    }
    else
    {
        $QueryBooking = "SELECT ID, Datum, Aantal, Klanten_ID AS KlantenID, Tafel_ID AS TafelID FROM reserveringen";
    }

    $resultBooking=$con->query($QueryBooking);
    if($stmt = mysqli_prepare($con, $QueryBooking)){
        $tableBooking = "";
       while($rowBooking = $resultBooking->fetch_assoc())
       {
        if($rowBooking != NULL)
        {   
            $id = $rowBooking['ID'];
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

            $tableBooking .= 
            "<tr> 
                <td>" . $Aantal . "</td> 
                <td>" . $KlantNaam . "</td>
                <td>" . $TafelID . "</td> 
                <td>" . $Datum . "</td>
                <td> 
                    <a href='?booking=" . $id ."&action=edit' class='btn btn-warning'>
                        <i class='fa-regular fa-pen'></i>
                    </a>
                    <a href='?booking=" . $id . "&action=delete' class='btn btn-danger'>
                        <i class='fa-regular fa-trash'></i>
                    </a>
                </td> 
            </tr>";
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
                            echo $tableBooking;
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
            "info":     false,
            "bLengthChange": false,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/nl-NL.json"
            }
        });
    } );
</script>