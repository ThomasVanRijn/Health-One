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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    include("database.php");
    $db = new PDO("mysql:host=localhost;dbname=HealthOne", "root", "");
    $query = $db->prepare("SELECT * FROM patient");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <div class="jumbotron text-center">
        <h1>Health One</h1>
        <p>Zoek uw patient</p>

        <div class="container">
            <div class="progress">
                <div class="darkmode-ignore progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:50%"></div>
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
                            <th>Leeftijd</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        $functie = $_SESSION["functie"];
                        if ($functie == "apotheker") {
                            foreach ($result as &$data) {
                                echo "<tr>";
                                echo "<td>" . "<a href='patient-gegevensApotheker.php?id=" . $data['id'] . "'>" . $data["naam"] . "</a></td>";
                                echo "<td>" . $data["leeftijd"] . "</td>";
                                echo "<td>" . $data["email"] . "</td>";
                                echo "</tr>";
                            }
                        }
                        elseif ($functie == "Arts") {
                            foreach ($result as &$data) {
                                echo "<tr>";
                                echo "<td>" . "<a href='patient-gegevens.php?id=" . $data['id'] . "'>" . $data["naam"] . "</a></td>";
                                echo "<td>" . $data["leeftijd"] . "</td>";
                                echo "<td>" . $data["email"] . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
<link rel="stylesheet" href="css/darkmode.css">
<script src="darkmode.js"></script>

</html>