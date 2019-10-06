<?php

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = $naam = $adres = $email = $telefoonnummer = $functie = "";
$username_err = $password_err = $confirm_password_err = $naam_err = $adres_err = $email_err = $telefoonnummer_err = $functie_err = "";


// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Vul alsutblieft uw gebruikersnaam in";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = :username";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    $username_err = "Deze gebruikersnaam bestaat al";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }


        // Validate username

    // Validate username
    if (empty(trim($_POST["naam"]))) {
        $naam_err = "Vul alsutblieft uw naam in";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE naam = :naam";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":naam", $param_naam, PDO::PARAM_STR);

            // Set parameters
            $param_naam = trim($_POST["naam"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    $naam_err = "Deze naam bestaat al";
                } else {
                    $naam = trim($_POST["naam"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Validate username
    if (empty(trim($_POST["adres"]))) {
        $adres_err = "Vul alsutblieft uw adres in";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE adres = :adres";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":adres", $param_adres, PDO::PARAM_STR);

            // Set parameters
            $param_adres = trim($_POST["adres"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    $adres_err = "Dit adres bestaat al";
                } else {
                    $adres = trim($_POST["adres"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Validate username
    if (empty(trim($_POST["email"]))) {
        $email_err = "Vul alsutblieft uw email in";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = :email";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    $email_err = "Deze email bestaat al";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Validate username
    if (empty(trim($_POST["telefoonnummer"]))) {
        $naam_err = "Vul alsutblieft uw telefoonnummer in";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE telefoonnummer = :telefoonnummer";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":telefoonnummer", $param_telefoonnummer, PDO::PARAM_STR);

            // Set parameters
            $param_telefoonnummer = trim($_POST["telefoonnummer"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    $telefoonnummer_err = "Dit telefoonnummer bestaat al";
                } else {
                    $telefoonnummer = trim($_POST["telefoonnummer"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    if (empty(trim($_POST["functie"]))) {
        $naam_err = "Vul alsutblieft uw functie in";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE functie = :functie";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":functie", $param_functie, PDO::PARAM_STR);

            // Set parameters
            $param_functie = trim($_POST["functie"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1000000000000) {
                    $functie_err = "Deze functie zit vol";
                } else {
                    $functie = trim($_POST["functie"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Vul een wachtwoord";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Wachtwoord moet minstens uit 6 letters of cijfers bestaan";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Bevestig wachtwoord";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Wachtwoorden komen niet overeen";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($naam_err) && empty($adres_err) && empty($email_err) && empty($telefoonnummer_err) && empty($funtie_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, naam, adres, email, telefoonnummer, functie) VALUES (:username, :password, :naam, :adres, :email, :telefoonnummer, :functie)";
        

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":naam", $param_naam, PDO::PARAM_STR);
            $stmt->bindParam(":adres", $param_adres, PDO::PARAM_STR);
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":telefoonnummer", $param_telefoonnummer, PDO::PARAM_STR);
            $stmt->bindParam(":functie", $param_functie, PDO::PARAM_STR);

            // Set parameters
            $param_username = $username;
            $param_naam = $naam;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_adres = $adres;
            $param_email = $email;
            $param_telefoonnummer = $telefoonnummer;
            $param_functie = $functie;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page


                    header("location: login.php");

            } else {
                echo "Something went wrong. Please try again later.";
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
        <p>Registreren</p>
    </div>
    <div class="container">
        <h2>Registreren</h2>
        <p>Maak hieronder een account aan</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Gebruikersnaam</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Wachtwoord</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Bevestig wachtwoord</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($naam_err)) ? 'has-error' : ''; ?>">
                <label>Naam</label>
                <input type="name" name="naam" class="form-control" value="<?php echo $naam; ?>">
                <span class="help-block"><?php echo $naam_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($adres_err)) ? 'has-error' : ''; ?>">
                <label>Adres</label>
                <input type="adres" name="adres" class="form-control" value="<?php echo $adres; ?>">
                <span class="help-block"><?php echo $adres_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="name" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($telefoonnummer_err)) ? 'has-error' : ''; ?>">
                <label>Telefoonnummer</label>
                <input type="number" name="telefoonnummer" class="form-control" value="<?php echo $telefoonnummer; ?>">
                <span class="help-block"><?php echo $telefoonnummer_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($functie_err)) ? 'has-error' : ''; ?>">
                <label>Functie</label>
                <select name="functie" value="<?php echo $functie; ?>" class="form-control">
                    <option>artsen</option>
                    <option>Apotheker</option>
                    <option>Verzekering</option>
                </select>
                <span class="help-block"><?php echo $functie_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Login">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Heeft u al een account? <a href="login.php">Log dan hier in</a>.</p>
        </form>
    </div>
</body>

</html>