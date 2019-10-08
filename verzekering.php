<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["functie"] !== "verzekering") {
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
    <link rel="stylesheet" href="css/index.css">
    <script src="https://kit.fontawesome.com/24821f9d87.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="jumbotron text-center">
        <h1>Welkom, <?php echo htmlspecialchars($_SESSION["naam"]); ?>!</h1>
        <h1>Health One</h1>
        <p>Kies</p>
    </div>
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-4">
                <a href="medicijnen-lijst.php"><button class="btn btn-block">MEDICIJNEN BEHEREN</button></a>
            </div>
            <div class="col-lg-4">
                <a href="patient-lijst.php"><button class="btn btn-block">PATIENTEN BEHEREN</button></a>
            </div>
            <div class="col-lg-4">
                <a href="mijngegevens.php"><button class="btn btn-block">Gegevens beheren</button></a>
            </div>
            <div class="col-lg-4">
                <a href="gebruikers-beheren.php"><button class="btn btn-block">Gebruikers beheren</button></a>
            </div>
        </div>
    </div>
    <a href="logout.php"><button class="btn btn-danger">Uitloggen</button></a>
</body>




<link rel="stylesheet" href="css/darkmode.css">
<script src="darkmode.js"></script>
</html>