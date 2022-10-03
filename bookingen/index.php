<?php 
    //session start
    session_start();

    //voegt de benodigde bestanden toe
    include('../Assets/Config.php');
    include('../Assets/Header.php');
    // include('../header.php');
    include('../Assets/Checklogin.php');

    $_SESSION['userid'] = "5";

    $KlantID = $_SESSION['userid'];

    $QueryBooking = "SELECT Datum, Aantal, Klanten_ID AS KlantenID, Tafel_ID AS TafelID FROM reserveringen WHERE Klanten_ID = '$KlantID'";
    $resultBooking=$con->query($QueryBooking);
    if($stmt = mysqli_prepare($con, $QueryBooking)){
       while($rowBooking = $resultBooking->fetch_assoc())
       {
        if($rowBooking != NULL)
        {   
            $Datum = $rowBooking['Datum'];
            $Aantal = $rowBooking['Aantal'];
            $KlantID = $rowBooking['KlantenID'];
            $TafelID = $rowBooking['TafelID'];
        }
       }
    }

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

?>


<body>

    <div class="container">
        <table id="bookingenTable" class="display">
            <thead>
                <tr>
                    <th>Aantal persoonen</th>
                    <th>Gast</th>
                    <th>Tafel</th>
                    <th>Datum</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Row 1 Data 1</td>
                    <td>Row 1 Data 2</td>
                    <td>Row 1 Data 1</td>
                    <td>Row 1 Data 2</td>
                </tr>
                <tr>
                    <td>Row 2 Data 1</td>
                    <td>Row 2 Data 2</td>
                    <td>Row 1 Data 1</td>
                    <td>Row 1 Data 2</td>
                </tr>
            </tbody>
        </table>
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