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
try {
    include("classes/recept.php");
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
    $queryRecept = $db->prepare("SELECT naam, medicijnID, hoeveelheid, datum, herhaalrecept FROM recept LEFT JOIN medicijnen ON recept.medicijnID = medicijnen.id where kaartnummer = :id AND afgehandeld = FALSE  ORDER BY datum DESC");
    $queryRecept->bindParam("id", $id);
    $queryRecept->execute();
    $recepten = $queryRecept->fetchAll(PDO::FETCH_CLASS, "recept");


    $queryName = $db->prepare("SELECT naam, id FROM patient where id = :id ");
    $queryName->bindParam("id", $id);
    $queryName->execute();
    $resultName = $queryName->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Database not connected";
}
?>
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th colspan="4"><?php echo $resultName[0]['naam']; ?></th>
                </tr>
                <tr>
                    <th>medicijn</th>
                    <th>hoeveelheid</th>
                    <th>datum</th>
                    <th>herhaalrecept</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($recepten) {
                    foreach ($recepten as $recept) : ?>
                        <tr class="clickable"
                            onclick="window.location='apotheek-recept.php?id=<?= $resultName[0]['id'] . "&mcid=" . $recept->getMedicijnID() . "&datum=" . $recept->getDatum()->format('Y-m-d') ?>'">
                        <td> <?= $recept->getNaam() ?></td>
                        <td> <?= $recept->getHoeveelheid() ?> </td>
                        <td> <?= $recept->getDatum()->format('d-m-Y') ?> </td>
                        <?php if ($recept->getHerhaalrecept()) : ?>
                            <td><?= "ja" ?> </td>
                        <?php else : ?>
                            <td><?= "nee" ?> </td>
                        <?php endif; ?>
                        </tr>
                    <?php endforeach;
                } else {
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
