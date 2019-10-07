<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["functie"] !== "apotheker") {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Health One</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body id="darkxlight">

<div class="jumbotron text-center">
    <h1>Health One</h1>
    <p>Zoek patient</p>

    <div class="container">
        <div class="progress">
            <div class="darkmode-ignore progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:33%"></div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row text-center">
        <div class="col">
            <div class="form-group">
                <input class="form-control" id="myInput" type="text" placeholder="Search..">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Naam</th>
                    <th>Pas nummer</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody id="myTable">
                <tr class="clickable"
                    onclick="window.location='ThomasVanRijn.php'"">
                    <td>Thomas van Rijn</td>
                    <td>TR-02-10-02</td>
                    <td>302190448@student.rocmondriaan.nl</td>
                </tr>
                <tr>
                    <td>Luca van Leeuwen</td>
                    <td>LL-21-02-01</td>
                    <td>302847928@student.rocmondriaan.nl</td>
                </tr>
                <tr>
                    <td>Collin van de Laar</td>
                    <td>CL-04-12-01</td>
                    <td>302983549@student.rocmondriaan.nl</td>
                </tr>
                <tr>
                    <td>Gijs de Lange</td>
                    <td>GL-23-05-01</td>
                    <td>302133210@student.rocmondriaan.nl</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
<link rel="stylesheet" href="css/darkmode.css">
<script src="darkmode.js"></script>
</html>