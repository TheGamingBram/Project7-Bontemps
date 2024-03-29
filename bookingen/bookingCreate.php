<?php 
    //voegt de benodigde bestanden toe
    include('../Assets/Config.php');
    include('../Assets/Checklogin.php');
    include('Booking.php');

    //zegt of het een medewerker of een klant

    //checkt of je een klant of medewerkerbent
    if(!$_SESSION['HumanClass'])
    {
        $inhoudtafel = '<input type="text" hidden value="0" name="TafelID" id="TafelID" class="form-control">';

        $inhoudklant = '<input type="text" hidden value="'.$_SESSION['userid'].'" name="KlantID" id="KlantID" class="form-control">';
    }else
    {
        $inhoudtafel = '<label class="label" for="Tafel">Tafel</label>';
        $inhoudtafel .= '<input type="text" placeholder="Tafel" name="TafelID" id="TafelID" class="form-control" required>';

        $inhoudklant = '<label class="label" for="KlantenNaam">Klant</label>';
        $inhoudklant .= '<input type="text" placeholder="Klanten Naam" name="KlantenNaam" id="KlantenNaam" class="form-control" required>';
    }

    //voegt de booking toe aan de database
	if(isset($_POST['toevoegen']))
	{
		$Datum = $_POST['Datum'];
		$AantalPesoonen = $_POST['AantalPersoonen'];
		$TafelID = $_POST['TafelID'];

        if(!$_SESSION['HumanClass'])
        {
		    $KlantID = $_POST['KlantID'];
        }else
        {
		    $KlantenNaam = $_POST['KlantenNaam'];
            $KlantID = Booking::getCustomerID($KlantenNaam);
        }

        $arrayBooking = ['date' => $Datum, 'quantity' => $AantalPesoonen, 'customerId' => $KlantID, 'tableId' => $TafelID];
        Booking::insert($arrayBooking);

        // prettyprint($arrayBooking);
        header("location: index.php");
	}

    include("../Assets/Header.php"); //connection Styling
?>


<body>
    <div class="container">
        <div class="card my-4">
            <div class="card-header">
                <div class="card-title">
                    <h1>
                        Booking plaatsen
                    </h1>
                </div>
            </div>
            <div class="card-body">
                <form action="bookingCreate.php" method="post" autocomplete="off">
                    <div class="mb-3">
                        <label class="label" for="Datum">Datum</label>
                        <input type="datetime-local" placeholder="Datum" name="Datum" id="Datum" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="label" for="AantalPersoonen">Aantal Persoonen</label>
                        <input type="AantalPersoonen" placeholder="Aantal Persoonen" name="AantalPersoonen" id="AantalPersoonen" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <?php echo $inhoudtafel;?>
                    </div>
                    <div class="mb-3">
                        <?php echo $inhoudklant;?>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Maak Boeking" name="toevoegen" class="btn btn-success">
                        <input type="submit" value="Annuleer" name="Annuleer" class="btn btn-danger" onClick="document.location.href='index.php'">
                    </div>
                </form>
            </div>
        </div>
    </div> 
</body>