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
            <form action="patient_database_add.php" method="post">
                <p>
                    <label for="naam">Naam</label>
                    <input type="text" class="form-control" name="naam" id="naam" placeholder="Naam van de Patient">
                </p>
                <p>
                    <label for="leeftijd">Leeftijd</label>
                    <input type="text" name="leeftijd" class="form-control" id="leeftijd" placeholder="">
                </p>
                <p>
                    <label for="adres">Adres</label>
                    <input type="text" class="form-control" name="adres" id="adres" placeholder="Adres van de Patient">
                </p>
                <p>
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email van de Patient">
                </p>
                <p>
                    <label for="email">Telefoonnummer</label>
                    <input type="text" class="form-control" name="telefoonnummer" id="telefoonnummer" placeholder="Telefoonnumemr van de Patient">
                </p>
                <p>
                    <label for="email">Verzekeringsnummer</label>
                    <input type="text" class="form-control" name="verzekeringsnummer" id="verzekeringsnummer" placeholder="Verzekeringsnummer van de Patient">
                </p>
                <p>
                    <label for="email">Aandoeningen</label>
                    <input type="text" class="form-control" name="aandoeningen" id="aandoeningen" placeholder="Aandoeningen van de Patient">
                </p>
                <input type="submit" value="wijzig">
            </form>
        </div>
    </div>
</div>
</body>
</html>