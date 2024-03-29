<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["functie"] !== "verzekering") {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Health One</title>
    <link rel="shortcut icon" href="img/HealthOne-logo.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/24821f9d87.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<?php
$db = new PDO("mysql:host=localhost;dbname=HealthOne", "root", "");
$query = $db->prepare("SELECT * FROM users WHERE id = " . $_GET['id']);

$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as &$data) {
    if($data['functie'] == "artsen"){
        $data['functie'] = "Arts";
    }
    elseif($data['functie'] == "apotheker"){
        $data['functie'] = "Apotheker";
    }
    else{
        $data['functie'] = "Verzekeringsmedewerker";
    }
}
?>
<body>

<div class="jumbotron text-center">
    <h1>Health One</h1>
    <p>Gebruikers gegevens wijzigen</p>

    <div class="container">
        <div class="progress">
            <div class="darkmode-ignore progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:75%"></div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row ">
        <div class="col">
            <form action="gebruiker_database_wijzig.php?id=<?php echo $data['id'] ?>" method="post">
                <p>
                    <label for="naam">Naam</label>
                    <input type="text" class="form-control" name="naam" id="naam" value='<?php echo $data['naam']; ?>'>
                </p>
                <p>
                    <label for="Herhaal">Adres</label>
                    <input type="text" name="adres" class="form-control" id="adres" value='<?php echo $data['adres'] ?>'>
                </p>
                <p>
                    <label for="vergoed">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value='<?php echo $data['email'] ?>'>
                </p>
                <p>
                    <label for="vergoed">Telefoonnummer</label>
                    <input type="text" class="form-control" name="telefoonnummer" id="telefoonnummer" value='<?php echo $data['telefoonnummer'] ?>'>
                </p>
                <p>
                    <label for="vergoed">Functie</label>
                    <input type="text" class="form-control" name="telefoonnummer" id="telefoonnummer" value='<?php echo $data['functie'] ?>'readonly>
                </p>

                <input type="submit" value="Wijzig" type="button" class="btn btn-success btn-block"><br>
            </form>
        </div>
    </div>
    <button type='button' class='darkmode-ignore btn btn-danger btn-block' data-toggle='modal' data-target='#exampleModal'>Verwijderen</button>
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
                    Weet u zeker dat u <?php echo $data['naam']; ?> als gebruiker wilt verwijderen?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleren</button>
                    <form method="post" action="gebruiker_verwijder.php?id=<?php echo $data['id']; ?>">
                        <button type="submit" name="id" value="<?php echo $_GET['id'] ?>" class="btn btn-danger">Gebruiker verwijderen?</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<link rel="stylesheet" href="css/darkmode.css">
<script src="darkmode.js"></script>
</html>