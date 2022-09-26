<?php 
    //voegt de benodigde bestanden toe
    include('Assets/Config.php');
    include('Assets/Header.php');
    include('Assets/Checklogin.php');

    //annuleert de ingevulde gegevens
    if(isset($_POST['Annuleer']))
	{
		header("location: booking.php");
	}

    //voegt de booking toe aan de database
	if(isset($_POST['toevoegen']))
	{
		$Datum = $_POST['Datum'];
		$AantalPesoonen = $_POST['AantalPersoonen'];
		$KlantID = $_POST['KlantID'];
		$TafelID = $_POST['TafelID'];

		$QueryBooking = "INSERT INTO reserveringen (Datum, Aantal, Klanten_ID, Tafel_ID) 
				VALUES ('$Datum', '$AantalPesoonen', '$KlantID', '$TafelID');";
			mysqli_query($con, $QueryBooking);

            // prettyprint($QueryBooking);
		header("location: booking.php");
	}
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
                    <form action="booking.php" method="post" autocomplete="off">
                        <div class="mb-3">
                            <label class="label" for="Datum">Datum</label>
                            <input type="datetime-local" placeholder="Datum" name="Datum" id="Datum" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="label" for="AantalPersoonen">Aantal Persoonen</label>
                            <input type="AantalPersoonen" placeholder="Aantal Persoonen" name="AantalPersoonen" id="AantalPersoonen" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="label" for="Tafel">Tafel</label>
                            <input type="text" placeholder="Tafel" name="TafelID" id="TafelID" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" hidden placeholder="KlantID" value="5" name="KlantID" id="KlantID" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Maak Boeking" name="toevoegen" class="btn btn-success">
                            <input type="submit" value="Annuleer" name="Annuleer" class="btn btn-danger">
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </body>