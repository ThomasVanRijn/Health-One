<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $naam = "";
$username_err = $password_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Vul alstublieft uw gebruikersnaam in";
    } else{
        $username = trim($_POST["username"]);
    }
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Vul alstublieft uw wachtwoord in.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, naam, telefoonnummer, adres, email, functie, password FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $naam = $row["naam"];
                        $adres = $row["adres"];
                        $telefoonnummer = $row["telefoonnummer"];
                        $email = $row["email"];
                        $username = $row["username"];
                        $functie = $row["functie"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            if($functie == "artsen"){
                                $functie = "Arts";
                            }
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["naam"] = $naam;  
                            $_SESSION["adres"] = $adres; 
                            $_SESSION["email"] = $email; 
                            $_SESSION["telefoonnummer"] = $telefoonnummer;  
                            $_SESSION["functie"] = $functie;                             
                            

                            if ($functie == "Arts"){
                                header("location: arts.php");
                            }
                            elseif ($functie == "verzekering"){
                                header("location: verzekering.php");
                            }
                            elseif ($functie == "apotheker") {
                                header("location: apotheek.php");
                            }
                            // Redirect user to welcome page
                            
                            
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "Het wachtwoord komt niet overeen met de gebruikersnaam";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "Geen account gevonden met de gebruikersnaam die u opgaf";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <title>Health One</title>
    <link rel="shortcut icon" href="img/HealthOne-logo.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/24821f9d87.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body id="home">

    <div class="jumbotron text-center">
        <h1>Health One</h1>
        <p>Inloggen</p>
    </div>
    <div class="container">
        
        <h2>Inloggen</h2>
        <p>Vul hieronder uw gegevens in om in te loggen</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Gebruikersnaam</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Wachtwoord</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="darkmode-ignore btn btn-success" value="Login">
            </div>
            <p>Nog geen account? <a href="register.php">Registreer u hierzo</a>.</p>
        </form>
    </div>
</body>

<script src="darkmode.js"></script>

</html>