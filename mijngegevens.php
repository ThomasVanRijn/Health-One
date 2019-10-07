<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
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
    <script src="darkmode.js"></script>
</head>

<body id="home">

    <div class="jumbotron text-center">
        <button onclick="darkxlight()"> Dark/Light</button>
        <h1>Welkom, <?php echo htmlspecialchars($_SESSION["naam"]); ?>!</h1>
        <h1>Health One</h1>
        <p>Gegevens beheren</p>
    </div>
    <div class="container">
    <form>
  <div class="form-group">
    <input class="form-control" type="text" placeholder="Gebruikersnaam: <?php echo htmlspecialchars($_SESSION["username"]); ?>" readonly><br>
    <input class="form-control" type="text" placeholder="Naam: <?php echo htmlspecialchars($_SESSION["naam"]); ?>" readonly><br>
    <input class="form-control" type="text" placeholder="Adres: <?php echo htmlspecialchars($_SESSION["adres"]); ?>" readonly><br>
    <input class="form-control" type="text" placeholder="Email: <?php echo htmlspecialchars($_SESSION["email"]); ?>" readonly><br>
    <input class="form-control" type="text" placeholder="Telefoonnummer: 0<?php echo htmlspecialchars($_SESSION["telefoonnummer"]); ?>" readonly><br>
    <input class="form-control" type="text" placeholder="Functie: <?php echo htmlspecialchars($_SESSION["functie"]); ?>" readonly><br>
    <a href="reset-password.php" class="btn btn-success">Wachtwoord wijzigen</a>
  </div>
    </div>