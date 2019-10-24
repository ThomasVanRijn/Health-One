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

</div>

<?php
include("classes/patient.php");
include("classes/databaseconection.php");
$query = $db->prepare("SELECT * FROM patient");
$query->execute();
$patienten = $query->fetchAll(PDO::FETCH_CLASS, "patient");

?>

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
            <table class="table table-hover table-responsive-lg">
                <thead>
                <tr>
                    <th>Naam</th>
                    <th>geboortedatum</th>
                    <th>verzekeringsnummer</th>
                </tr>
                </thead>
                <tbody id="myTable">
                <?php
                if ($patienten) {
                    foreach ($patienten as $patient) : ?>
                        <tr class="clickable"
                            onclick="window.location='apotheek-patient.php?id=<?= $patient->getId() ?>'">
                            <td><?= $patient->getNaam() ?></td>
                            <td><?= $patient->getGeboortedatum()->format('d-m-Y'); ?></td>
                            <td><?= $patient->getVerzekeringsnummer() ?> </td>
                        </tr>
                    <?php endforeach;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase().trim();
            $("#myTable tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
</body>
</html>