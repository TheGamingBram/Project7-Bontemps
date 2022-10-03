<?php 
    //session start
    session_start();

    //voegt de benodigde bestanden toe
    // include('Assets/Config.php');
    // include('Assets/Header.php');
    include('header.php');
    include('Assets/Checklogin.php');

?>


<body>
    
    <div class="container">
        <table id="bookingenTable" class="display">
            <thead>
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Row 1 Data 1</td>
                    <td>Row 1 Data 2</td>
                </tr>
                <tr>
                    <td>Row 2 Data 1</td>
                    <td>Row 2 Data 2</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>




<script>
    $(document).ready( function () {
        $('#bookingenTable').DataTable();
    } );
</script>