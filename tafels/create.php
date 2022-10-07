<?php
include("../Assets/config.php"); //connection to database and some test functions
include("../Assets/header.php"); //insert to bootstrap and other java scripts
 
// Define variables and initialize with empty values
$naam = $personen = "";
$naam_err = $personen_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate naam
    $input_naam = trim($_POST["naam"]);
    if(empty($input_naam)){
        $naam_err = "Vul een naam in";
    } elseif(!filter_var($input_naam, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $naam_err = "Vul een geldige naam in";
    } else{
        $naam = $input_naam;
    }
 
    // Validate personen
    $input_personen = trim($_POST["personen"]);
    if(empty($input_personen)){
        $personen_err = "Vul een getal in";     
    } elseif(!ctype_digit($input_personen)){
            $personen_err = "Dat is geen getal";
    } else{
        $personen = $input_personen;
    }
    
    // Check input errors before inserting in database
    if(empty($naam_err) && empty($personen_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO tafels (naam, personen) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_naam, $param_personen);
            
            // Set parameters
            $param_naam = $naam;
            $param_personen = $personen;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
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
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="../Assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Nieuwe tafel toevoegen</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                        <input type="submit" class="btn btn-primary" value="Voeg toe">
                        <a href="./" class="btn btn-secondary ml-2">Annuleer</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>