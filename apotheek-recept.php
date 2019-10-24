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
<div class="jumbotron text-center">
    <h1>Health One</h1>
    <p>Zoek patient</p>


</div>

<?php
try {
    include("classes/patient.php");
    include("classes/recept.php");
    include("classes/medicijn.php");
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
    $mcid = filter_input(INPUT_GET, 'mcid', FILTER_SANITIZE_NUMBER_INT);
    $datum = filter_input(INPUT_GET, 'datum', FILTER_SANITIZE_STRING);
    $queryRecept = $db->prepare("SELECT naam, medicijnID, hoeveelheid, datum, herhaalrecept FROM recept LEFT JOIN medicijnen ON recept.medicijnID = medicijnen.id where patientID = :id AND medicijnID = :mcid AND datum = :datum");
    $queryRecept->bindParam("id", $id);
    $queryRecept->bindParam("mcid", $mcid);
    $queryRecept->bindParam("datum", $datum);

    $queryName = $db->prepare("SELECT * FROM patient where id = :id ");
    $queryName->bindParam("id", $id);
    $queryName->execute();
    $naam = $queryName->fetchAll(PDO::FETCH_CLASS, "patient");
} catch (PDOException $e) {
    echo "Database not connected";
}
?>
<div class="container">
    <div class="row">
        <div class="col">
            <form method='post'>
                <div class="form-group">
                    <table class="table table-hover table-responsive-lg">
                        <caption>
                            <?php echo $naam[0]->getNaam() ?>
                        </caption>
                        <thead>
                        <tr>
                            <th>medicijn</th>
                            <th>hoeveelheid</th>
                            <th>datum</th>
                            <th>herhaalrecept</th>
                            <th>aanpassen</th>
                            <?php
                            if (!isset($_POST['aanpassen'])) {
                                echo "<th>afhandelen</th>";
                            }
                            ?>
                        </tr>
                        </thead>
                        <tbody id="myTable">
                        <?php
                        $queryRecept->execute();
                        $recepten = $queryRecept->fetchAll(PDO::FETCH_CLASS, 'recept');
                        $recept = $recepten[0]; ?>
                        <tr>
                            <td><?= $recept->getNaam() ?></td>
                            <td><?= $recept->getHoeveelheid() ?></td>
                            <td><?= $recept->getDatum()->format('d-m-Y') ?></td>
                            <?php if ($recept->getHerhaalrecept()) : ?>
                                <td>ja</td>
                            <?php else : ?>
                                <td>nee</td>
                            <?php endif; ?>



                            <?php if (!isset($_POST['aanpassen'])) : ?>
                                <td><input class="btn btn-success" type='submit' name='aanpassen' value='aanpassen'>
                                </td>
                                <td><input class="btn btn-success" type='submit' name='afhandelen' value='afhandelen'>
                                </td>
                            <?php else : ?>
                                <td><input class="btn btn-success" type='submit' name='aangepast' value='aanpassen'>
                                </td>
                            <?php endif; ?>

                        </tr>

                    </table>

                    <?php if (isset($_POST['aanpassen']) || isset($_POST['aangepast'])) {
                    $queryMedicijn = $db->prepare("SELECT * FROM medicijnen");
                    $queryMedicijn->execute();
                    $medicijnen = $queryMedicijn->fetchAll(PDO::FETCH_CLASS, "medicijn");
                    if (isset($_POST['aanpassen'])) : ?>
                    <br>
                    Kies een nieuw medicijn of andere hoeveelheid.
                    <br><br>

                    <input class="form-control" type='text' name='hoeveelheid'
                           value='<?= $recept->getHoeveelheid() ?> '>
                    <br>


                    <?php foreach ($medicijnen as $medicijn) : ?>
                        <div class="form-check">
                            <?php if ($medicijn->getId() == $_GET['mcid']) : ?>
                                <input class="form-check-input" type='radio' name='medicijn'
                                       value='<?= $medicijn->getId() ?>'
                                       checked id="<?= $medicijn->getID() ?>">
                            <?php else : ?>
                                <input class="form-check-input" type='radio' name='medicijn'
                                       value='<?= $medicijn->getId() ?> ' id="<?= $medicijn->getId() ?>">
                            <?php endif; ?>
                            <label class="form-check-label"
                                   for="<?= $medicijn->getId() ?>"><?= $medicijn->getNaam() ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </form>
            <?php endif;
            if (isset($_POST['aangepast'])) {
                $newMCID = filter_input(INPUT_POST, "medicijn", FILTER_SANITIZE_NUMBER_INT);
                $hoeveelheid = filter_input(INPUT_POST, "hoeveelheid", FILTER_SANITIZE_STRING);
                $queryAanpassen = $db->prepare("UPDATE recept SET medicijnID = :medicijn, hoeveelheid = :hoeveelheid WHERE patientID = :id AND medicijnID = :mcid AND datum = :datum");
                $queryAanpassen->bindParam('id', $id);
                $queryAanpassen->bindParam('mcid', $mcid);
                $queryAanpassen->bindParam('datum', $datum);
                $queryAanpassen->bindParam('medicijn', $newMCID);
                $queryAanpassen->bindParam('hoeveelheid', $hoeveelheid);
                $queryAanpassen->execute();

                header('location: apotheek-recept.php?id=' . $id . '&mcid=' . $newMCID . '&datum=' . $datum);
            }
            }
            if (isset($_POST['afhandelen'])) : ?>
            <form method='post' class="form-group">
                <div class="form-group">
                    weet u zeker dat u het wilt afhandelen?
                    <br>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type='radio' name='keuze' value='yes' id="ja">
                        <label class="form-check-label" for="ja">ja</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type='radio' name='keuze' value='no' id="no">
                        <label class="form-check-label" for="no">nee</label>
                    </div>
                    <br><br>
                    <input class="btn btn-success" type='submit' name='verstuur' value='verstuur'>
                </div>
        </div>
        </form>
        <?php endif;
        if (isset($_POST['verstuur'])) {
            if ($_POST['keuze'] == "yes") {
                $queryAfhandelen = $db->prepare("UPDATE recept SET afgehandeld = TRUE WHERE patientID = :id AND medicijnID = :mcid AND datum = :datum");
                $queryAfhandelen->bindParam('id', $id);
                $queryAfhandelen->bindParam('mcid', $mcid);
                $queryAfhandelen->bindParam('datum', $datum);
                $queryAfhandelen->execute();
                echo "het is afgehandeld";
            }
        }
        ?>
        </tbody>
        </table>
    </div>
</div>
</div>
</body>
</html>
