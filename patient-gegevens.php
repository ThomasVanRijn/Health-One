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
                        echo "<tr>" . "<td>" . "Telefoonnummer:" . "</td>" . "<td>" . $data['telefoonnummer'] . "</td>" . "</tr>";
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
                        </tr>
                        <tr>
                            <td><button><a href="medicijn-toevoegen.php?id=<?php echo$data['id'] ?>">Medicijn toevoegen</a></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>