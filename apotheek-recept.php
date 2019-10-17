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
    include ("classes/patient.php");
    include ("classes/recept.php");
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
    $mcid = filter_input(INPUT_GET, 'mcid', FILTER_SANITIZE_NUMBER_INT);
    $datum = filter_input(INPUT_GET, 'datum', FILTER_SANITIZE_STRING);
    $queryRecept = $db->prepare("SELECT naam, medicijnID, hoeveelheid, datum, herhaalrecept FROM recept LEFT JOIN medicijnen ON recept.medicijnID = medicijnen.id where kaartnummer = :id AND medicijnID = :mcid AND datum = :datum");
    $queryRecept->bindParam("id", $id);
    $queryRecept->bindParam("mcid", $mcid);
    $queryRecept->bindParam("datum", $datum);

    $queryName = $db->prepare("SELECT naam, id FROM patient where id = :id ");
    $queryName->bindParam("id", $id);
    $queryName->execute();
    $naam = $queryName->fetchAll(PDO::FETCH_CLASS,"patient");
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
                    <th colspan="<?php if (!isset($_POST['aanpassen'])) {
                        echo '6';
                    } else {
                        echo '5';
                    } ?>"><?php echo $naam[0]->getNaam() ?></th>
                </tr>
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
                $resultRecept = $queryRecept->fetchAll(PDO::FETCH_ASSOC);
                foreach ($resultRecept as &$data) {
                    echo "<tr>";
                    echo "<td>" . $data['naam'] . "</td>";
                    echo "<td>" . $data['hoeveelheid'] . "</td>";
                    echo "<td>" . $data['datum'] . "</td>";
                    if ($data['herhaalrecept']) {
                        echo "<td>ja</td>";
                    } else {
                        echo "<td>nee</td>";
                    }
                    echo "<form method='post'>";


                    if (!isset($_POST['aanpassen'])) {
                        echo "<td> <input type='submit' name='aanpassen' value='aanpassen'></td>";
                        echo "<td> <input type='submit' name='afhandelen' value='afhandelen'></td>";
                    } else {
                        echo "<td> <input type='submit' name='aangepast' value='aanpassen'></td>";
                    }

                    echo "</tr>";

                }
                echo "</table>";

                if (isset($_POST['aanpassen']) || isset($_POST['aangepast'])) {
                    $queryMedicijn = $db->prepare("SELECT naam, id FROM medicijnen");
                    $queryMedicijn->execute();
                    $resultMedicijn = $queryMedicijn->fetchAll(PDO::FETCH_ASSOC);
                    if (isset($_POST['aanpassen'])) {
                        echo "<br>";
                        echo "Kies een nieuw medicijn of andere hoeveelheid";
                        echo "<br><br>";

                        echo "<input type='text' name='hoeveelheid' value='" . $resultRecept[0]['hoeveelheid'] . "'>";
                        echo "<table>";
                        foreach ($resultMedicijn as &$data) {
                            echo "<tr>";
                            if ($data['id'] == $_GET['mcid']) {
                                echo "<td><input type='radio' name='medicijn' value='" . $data['id'] . "' checked = 'checked'></td>";
                            } else {
                                echo "<td><input type='radio' name='medicijn' value='" . $data['id'] . "'></td>";
                            }
                            echo "<td>" . $data['naam'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "</form>";
                    }
                    if (isset($_POST['aangepast'])) {
                        $newMCID = filter_input(INPUT_POST, "medicijn", FILTER_SANITIZE_NUMBER_INT);
                        $hoeveelheid = filter_input(INPUT_POST, "hoeveelheid", FILTER_SANITIZE_STRING);
                        $queryAanpassen = $db->prepare("UPDATE recept SET medicijnID = :medicijn, hoeveelheid = :hoeveelheid WHERE kaartnummer = :id AND medicijnID = :mcid AND datum = :datum");
                        $queryAanpassen->bindParam('id', $id);
                        $queryAanpassen->bindParam('mcid', $mcid);
                        $queryAanpassen->bindParam('datum', $datum);
                        $queryAanpassen->bindParam('medicijn', $newMCID);
                        $queryAanpassen->bindParam('hoeveelheid', $hoeveelheid);
                        $queryAanpassen->execute();

                        header('location: apotheek-recept.php?id=' . $id . '&mcid=' . $newMCID . '&datum=' . $datum);
                    }
                }
                if (isset($_POST['afhandelen'])) {
                    echo"<form method='post'>";
                    echo "weet u zeker dat u het wilt afhandelen?";
                    echo "<br>";
                    echo "<input type='radio' name='keuze' value='yes'>ja";
                    echo "<br>";
                    echo "<input type='radio' name='keuze' value='no'>nee";
                    echo "<br>";
                    echo "<input type='submit' name='verstuur' value='verstuur'>";
                    echo"</form>";
                }
                if(isset($_POST['verstuur']))
                    if($_POST['keuze'] == "yes"){
                        $queryAfhandelen = $db->prepare("UPDATE recept SET afgehandeld = TRUE WHERE kaartnummer = :id AND medicijnID = :mcid AND datum = :datum");
                        $queryAfhandelen->bindParam('id', $id);
                        $queryAfhandelen->bindParam('mcid', $mcid);
                        $queryAfhandelen->bindParam('datum', $datum);
                        $queryAfhandelen->execute();
                        echo "het is afgehandeld";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
