<?php
    include("../Assets/config.php"); //connection to database and some test functions
    include("../Assets/header.php"); //insert to bootstrap and other java scripts

    session_start()

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="../Assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>



<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Tafel overzicht</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Nieuwe tafel</a>
                    </div>
                    <?php                   
                    // Attempt select query execution
                    $sql = "SELECT * FROM tafels";
                   if($result = $link->query($sql)){
                        if($result->num_rows > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Naam</th>";
                                        echo "<th>Personen</th>";
                                        echo "<th>Bewerken</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch_array()){
                                    echo "<tr>";
                                        echo "<td>" . $row['Naam'] . "</td>";
                                        echo "<td>" . $row['Personen'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="update.php?id='. $row['ID'] .'" class="mr-3" title="Bewerken" data-toggle="tooltip"><span class="fa-regular fa-pen"></span></a>';
                                            echo '<a href="delete.php?id='. $row['ID'] .'" title="Verwijderen" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            $result->free();
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    
                    // Close connection
                    $link->close();
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>