<?php
// Initialize the session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate new password
    $id = $_SESSION["id"];

    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        $id = $_SESSION["id"];

        $param_username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
        $param_naam = trim(filter_input(INPUT_POST, 'naam', FILTER_SANITIZE_STRING));
        $param_adres = trim(filter_input(INPUT_POST, 'adres', FILTER_SANITIZE_STRING));
        $param_email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
        $param_telefoonnummer = filter_input(INPUT_POST, 'telefoonnummer', FILTER_VALIDATE_INT);
        $param_id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        // Prepare an update statement
        $sql = "UPDATE users SET username = :username, naam = :naam, adres = :adres, email = :email, telefoonnummer= :telefoonnummer WHERE id = :id";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username);
            $stmt->bindParam(":naam", $param_naam);
            $stmt->bindParam(":adres", $param_adres);
            $stmt->bindParam(":email", $param_email);
            $stmt->bindParam(":telefoonnummer", $param_telefoonnummer);
            $stmt->bindParam(":id", $param_id);

            // Set parameters
            $id = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if ($stmt->rowCount() != 0) {
                    $_SESSION['naam'] = $param_naam;
                    $_SESSION['username'] = $param_username;
                    $_SESSION['adres'] = $param_adres;
                    $_SESSION['email'] = $param_email;
                    $_SESSION['telefoonnummer'] = $param_telefoonnummer;
                }
                // Password updated successfully. Destroy the session, and redirect to login page

                header("location: mijngegevens.php");
                exit();
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
    <h1>Welkom, <?php echo htmlspecialchars($_SESSION["naam"]); ?>!</h1>
    <h1>Health One</h1>
    <p>Gegevens wijzigen en inzien</p>
</div>
<div class="container">
    <h2>Mijn gegevens</h2>
    <p>Hier kunt u uw gegevens wijzigen en inzien.</p>
    <form action="" method="post">
        <input type="text" hidden name="id" value="<?= $_SESSION['id'] ?>" hidden>
        <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
            <label>Gebruikersnaam:</label>
            <input type="username" name="username" class="form-control" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>">
            <span class="help-block"><?php echo $new_password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
            <label>Naam:</label>
            <input type="name" name="naam" class="form-control" value="<?php echo htmlspecialchars($_SESSION["naam"]); ?>">
            <span class="help-block"><?php echo $new_password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
            <label>Adres:</label>
            <input type="adres" name="adres" class="form-control" value="<?php echo htmlspecialchars($_SESSION["adres"]); ?>">
            <span class="help-block"><?php echo $new_password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($_SESSION["email"]); ?>">
            <span class="help-block"><?php echo $new_password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
            <label>Telefoonnummer:</label>
            <input type="numbers" name="telefoonnummer" class="form-control" value="<?php echo htmlspecialchars($_SESSION["telefoonnummer"]); ?>">
            <span class="help-block"><?php echo $new_password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <label>Functie</label>
            <input type="words" name="functie" class="form-control" value="<?php echo htmlspecialchars($_SESSION["functie"]); ?>"readonly>
            <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Opslaan">
        </div>
    </form>
</div>
</body>
</html>