<!DOCTYPE html>
<html lang="en">
<head>
    <title>Health One</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron text-center">
    <h1>Health One</h1>
    <p>Zoek patient</p>

    <div class="container">
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:33%"></div>
        </div>
    </div>
</div>

<?php

$db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
$queryRecept = $db->prepare("SELECT naam, hoeveelheid, datum FROM recept LEFT JOIN medicijnen ON recept.medicijnID = medicijnen.id where kaartnummer = :id ORDER BY datum DESC");
$queryRecept->bindParam("id", $id);
$queryName = $db->prepare("SELECT naam FROM patient where id = :id ");
$queryName->bindParam("id", $id);
$queryName->execute();
$resultName = $queryName->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th colspan="3"><?php echo $resultName[0]['naam']; ?></th>
                </tr>
                <tr>
                    <th>medicijn</th>
                    <th>hoeveelheid</th>
                    <th>datum</th>
                </tr>
                </thead>
                <tbody id="myTable">
                <?php
                $queryRecept->execute();
                if ($queryRecept->rowCount() > 0) {
                    $resultRecept = $queryRecept->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($resultRecept as &$data) {
                        echo "<tr>";
                        echo "<td>" . $data['naam'] . "</td>";
                        echo "<td>" . $data['hoeveelheid'] . "</td>";
                        echo "<td>" . $data['datum'] . "</td>";
                        echo "</tr>";
                    }
                }else{
                    echo "<td colspan='3'>" . "Er zijn nog geen medicijnen nodig" . "</td>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
