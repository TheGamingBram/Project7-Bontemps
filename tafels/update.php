<?php
// Include config file
include("../Assets/config.php"); //connection to database and some test functions
 
// Define variables and initialize with empty values
$naam = $personen = "";
$naam_err = $personen_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["ID"]) && !empty($_POST["ID"])){
    // Get hidden input value
    $id = $_POST["ID"];
    
    // Validate naam
    $input_naam = trim($_POST["naam"]);
    if(empty($input_naam)){
        $naam_err = "Please enter a naam.";
    } elseif(!filter_var($input_naam, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $naam_err = "Please enter a valid naam.";
    } else{
        $naam = $input_naam;
    }
    
    // Validate personen
    $input_personen = trim($_POST["personen"]);
    if(empty($input_personen)){
        $personen_err = "Please enter the personen amount.";     
    } elseif(!ctype_digit($input_personen)){
        $personen_err = "Please enter a positive integer value.";
    } else{
        $personen = $input_personen;
    }
    
    // Check input errors before inserting in database
    if(empty($naam_err) && empty($personen_err)){
        // Prepare an update statement
        $sql = "UPDATE tafels SET Naam=?, Personen=? WHERE ID=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_naam, $param_personen);
            
            // Set parameters
            $param_naam = $naam;
            $param_personen = $personen;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["ID"]) && !empty(trim($_GET["ID"]))){
        // Get URL parameter
        $id =  trim($_GET["ID"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM tafels WHERE ID = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $naam = $row["Naam"];
                    $personen = $row["Personen"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bijwerken</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Bijwerken</h2>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Naam</label>
                            <input type="text" name="naam" class="form-control <?php echo (!empty($naam_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $naam; ?>">
                            <span class="invalid-feedback"><?php echo $naam_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Personen</label>
                            <input type="text" name="personen" class="form-control <?php echo (!empty($personen_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $personen; ?>">
                            <span class="invalid-feedback"><?php echo $personen_err;?></span>
                        </div>
                        <input type="hidden" name="ID" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Verstuur">
                        <a href="index.php" class="btn btn-secondary ml-2">Annuleer</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>