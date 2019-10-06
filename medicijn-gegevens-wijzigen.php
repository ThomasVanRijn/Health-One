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
<?php
                $db = new PDO("mysql:host=localhost;dbname=HealthOne", "root", "");
                $query = $db->prepare("SELECT * FROM medicijnen WHERE id = " . $_GET['id']);

                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as &$data) {
                }
                ?>
<body>
<div class="jumbotron text-center">
    <h1>Health One</h1>
    <p>Medcijn wijzigen</p>

    <div class="container">
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:75%"></div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row ">
        <div class="col">
            <form action="medicijn_database_wijzig.php?id=<?php echo $data['id'] ?>" method="post">
                <p>
                    <label for="naam">Naam</label>
                    <input type="text" class="form-control" name="naam" id="naam" value='<?php echo $data['naam']; ?>'>
                </p>
                <p>
                    <label for="Herhaal">Herhaal</label>
                    <input type="text" name="herhaal" class="form-control" id="herhaal" value='<?php echo $data['herhaal'] ?>'>
                </p>
                <p>
                    <label for="vergoed">Adres</label>
                    <input type="text" class="form-control" name="vergoed" id="vergoed" value='<?php echo $data['vergoed'] ?>'>
                </p>
            
                <input type="submit" value="Wijzig" type="button" class="btn btn-success btn-block"><br>
            </form>
        </div>
    </div>
    <button type='button' class='btn btn-danger btn-block' data-toggle='modal' data-target='#exampleModal'>Verwijderen</button>
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
</div>
</body>
</html>