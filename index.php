<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
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
    <link rel="stylesheet" href="css/style.scss">
    <script src="https://kit.fontawesome.com/24821f9d87.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="darkmode.js"></script>
</head>
<body id="darkxlight">

    <div class="jumbotron text-center">
        <button onclick="darkxlight()"> Dark/Light</button>
    <h1>Welkom, <?php echo htmlspecialchars($_SESSION["naam"]); ?>!</h1>
        <h1>Health One</h1>
        <p>Kies je afdeling</p>
    </div>

    <div class="container fluid">
        <div class="row text-center">
            <div class="col-lg-4" >
                <a style="text-decoration: none" href="arts-zoekpagina.php"><button class="btn btn-block">ARTS</button></a>
            </div>
            <div class="col-lg-4" >
                <a style="text-decoration: none" href="patient-zoekpagina.php"><button class="btn btn-block">APOTHEEK</button></a>
            </div>
            <div class="col-lg-4">
                <a style="text-decoration: none" href="verzekering.php"><button class="btn btn-block">VERZEKERING</button></a>
            </div>
            <div class="col-lg-4">
                <a style="text-decoration: none" href="logout.php"><button class="btn btn-block">UITLOGGEN</button></a>
            </div>
            <div class="col-lg-4">
                <a style="text-decoration: none" href="mijngegevens.php"><button class="btn btn-block">MIJN GEGEVENS</button></a>
            </div>
        </div>
    </div>
    <a class="info" href="#" data-toggle="popover" data-placement="left" title="Vragen?" data-content="Mail dan naar info@zilverenkruis.nl of bel 015-1234567">
        <i class="fas fa-question-circle fa-4x float-right"></i>
    </a>
</div>


</body>
</html>