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
    $query = $db->prepare("SELECT * FROM medicijnen");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <div class="jumbotron text-center">
        <h1>Health One</h1>
        <p>Zoek uw medicijn</p>

        <div class="container">
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:50%"></div>
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
                            <th>Vergoed</th>
                            <th>Wijzig</th>
                            <th>Verwijderen</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        foreach ($result as &$data) {
                            echo "<tr>";
                            echo "<td>" . $data["naam"] . "</td>";
                            echo "<td>" . $data["vergoed"] . "</td>";
                            echo "<td>" . "<a href='medicijn-gegevens-wijzigen.php?id=" . $data['id'] . "'>" . "<button type='button' class='btn btn-primary '>" . "Patiënt gegevens wijzigen" . "</button>" . "</a>";
                            echo "<td>" . "<button type='button' class='btn btn-danger btn-block' data-toggle='modal' data-target='#exampleModal'>" . "Verwijderen" . "</button>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary"><a href="medicijn_add.html">Medicijn toevogen</a></button>
            </div>
        </div>
    </div>
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
                    Weet u zeker dat u <?php echo $data['naam']; ?> uit de medicijnen lijst wilt verwijderen?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleren</button>
                    <form method="post" action="medicijn_verwijder.php?id=<?php echo $data['id']; ?>">
                        <button type="submit" name="id" value="<?php echo $_GET['id'] ?>" class="btn btn-danger">Medicijn verwijderen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase().trim();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>