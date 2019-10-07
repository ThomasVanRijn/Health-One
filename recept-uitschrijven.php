<!doctype html>
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
<?php
$db = new PDO("mysql:host=localhost;dbname=HealthOne", "root", "");
$query = $db->prepare("SELECT * FROM medicijnen");

$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>
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
    <form action="">
        <div class="form-group">
            <label>medicijn:</label><br>
            <select class="form-control" name="medicijn" id="">
                <?php
                foreach ($result as &$data) {
                    echo "<option>" . $data['naam'] . "</option>";
                }
                ?>
            </select>
            <br>
            <label>herhaalt:</label><br>
            <select class="form-control" name="herhaal" id="">
                <option>ja</option>
                <option>nee</option>
            </select>
            <br>
            <label>dosering:</label><br>
            <input class="form-control" type="number">
            <br>
            <label>omschrijving:</label><br>
            <textarea class="form-control" name="omschrijving"></textarea>
        </div>
        <input class="" type="submit">
    </form>
</div>

</body>
</html>