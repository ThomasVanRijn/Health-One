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
    <p>Patiënt toevoegen</p>

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
                    <input type="text" name="Herhaal" class="form-control" id="Herhaal" value='<?php echo $data['herhaal'] ?>'>
                </p>
                <p>
                    <label for="vergoed">Adres</label>
                    <input type="text" class="form-control" name="vergoed" id="vergoed" value='<?php echo $data['vergoed'] ?>'>
                </p>
            
                <input type="submit" value="wijzig" type="button" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
</body>
</html>