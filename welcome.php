<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$site = "";

if ($_SESSION["functie"] == 'Arts'){
    $site = 'patient-zoekpagina';
}
elseif ($_SESSION["functie"] == 'apotheker'){
    $site = 'apotheek';
}
else{
    $site = 'verzekering';
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
        <p>Welkom!</p>
    </div>
    <div class="container">
    <div class="row text-center">
        <h1>Hoi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?>
        </b>Welkom op onze site u bent een <?php echo htmlspecialchars($_SESSION["functie"]); ?> en kunt niet op de pagina die u net bezocht. Klik op de volgende link om naar de 
    pagina te gaan waar u wel recht op heeft: <a href="<?php echo $site; ?>.php">Link</a></h1><br>
    </p>
    </div>
    </div>
</body>
</html>