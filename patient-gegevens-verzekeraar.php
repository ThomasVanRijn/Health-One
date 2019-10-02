<!DOCTYPE html>
<html lang="en">

<head>
    <title>Health One</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/patient.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="jumbotron text-center">
        <h1>Health One</h1>
        <p>Informatie patient</p>

        <div class="container">
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:66%"></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-4">
                <?php
                $db = new PDO("mysql:host=localhost;dbname=HealthOne", "root", "");
                $query = $db->prepare("SELECT * FROM patient WHERE id = " . $_GET['id']);

                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as &$data) {
                    echo "<img src='img/avatar.png'>";
                }
                ?>
            </div>
            <div class="col-8">
                <table class="table">
                    <?php
                    try {
                        echo "<tr>" . "<td>" . "Naam:" . "</td>" . "<td>" . $data['naam'] . "</td>" . "</tr>";
                        echo "<tr>" . "<td>" . "Leeftijd:" . "</td>" . "<td>" . $data['leeftijd'] . "</td>" . "</tr>";
                        echo "<tr>" . "<td>" . "Adres:" . "</td>" . "<td>" . $data['adres'] . "</td>" . "</tr>";
                        echo "<tr>" . "<td>" . "Email:" . "</td>" . "<td>" . $data['email'] . "</td>" . "</tr>";
                        echo "<tr>" . "<td>" . "Telefoonnummer:" . "</td>" . "<td>" .  "0" . $data['telefoonnummer'] . "</td>" . "</tr>";
                    } catch (PDOException $e) {
                        die("Error!: " . $e->getMessage());
                    }
                    ?>

                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Naam</th>
                            <th>Aandoening</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Lorem Ipsum</td>
                            <td>
                                <?php
                                echo $data['aandoeningen'];
                                ?>
                            </td>
                            <td>


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Pas op!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Weet u zeker dat u de patiënt <?php echo $data['naam']; ?> wilt verwijderen?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleren</button>
                                                <form method="post" action="removepatient.php">
                                                    <button type="submit" name="id" value="<?php echo $_GET["id"] ?>" class="btn btn-danger">Patiënt verwijderen</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><button><a href="medicijn-toevoegen.php">Medicijn toevoegen</a></button></td>
                        </tr>
                    </tbody>
                </table>
                <table >
                    <a href="patient-gegevens-wijzigen.php?id=<?php echo $data['id'] ?>"> <button type="button" class="btn btn-primary btn-block">Patiënt gegevens wijzigen</button></a><br><br>
                    <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#exampleModal">
                        Patiënt verwijderen
                    </button>
                </table>
            </div>
        </div>
    </div>

</body>

</html>