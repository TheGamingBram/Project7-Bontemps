<?php 
    // include('config.php');

    //kijkt naar of iemand ingelogd is
    if($_SESSION["login"] == false)
    {
        header("location: ../index.php");
    }
?>