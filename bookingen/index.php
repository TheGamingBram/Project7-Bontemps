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
    
            header("location: index.php");
        }
    }


    $KlantID = $_SESSION['userid'];
    if(!$_SESSION['HumanClass'])
    {
        $QueryBooking = "SELECT * FROM reserveringen WHERE Klanten_ID = '$KlantID'";
    }
    else
    {
        $QueryBooking = "SELECT * FROM reserveringen";
    }

   $reservaties = Booking::select(null, $QueryBooking);
   
   $tableBooking = "";

   if($reservaties) {
        $dateToday = date('Y-m-d H:i:s');
        foreach($reservaties as $reservatie)
        {
            $addDelete = "";
            $sortDate = strtotime($reservatie->date);
            if($reservatie->date > $dateToday)
            {
                $addDelete = "  <a href='?booking=" . $reservatie->id ."&action=edit' class='btn btn-warning'>
                                    <i class='fa-regular fa-pen'></i>
                                </a>
                                <a href='?booking=" . $reservatie->id . "&action=delete' class='btn btn-danger'>
                                    <i class='fa-regular fa-trash'></i>
                                </a>";
            }

            $tableBooking .= 
            "<tr> 
                <td>" . $reservatie->quantity . "</td> 
                <td>" . $reservatie->getCustomerName() . "</td>
                <td>" . $reservatie->tableId . "</td> 
                <td data-sort='". $sortDate ."'>" . $reservatie->date . "</td>
                <td> 
                    ".$addDelete."
                </td> 
            </tr>";
        }
   }

   include("../Assets/Header.php"); //connection Styling
?>

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
                                    <a href="bookingCreate.php" class="btn btn-success"> 
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
            "info":     false,
            "bLengthChange": false,
            "order": [[3, 'desc']],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/nl-NL.json"
            }
        });
    } );
</script>