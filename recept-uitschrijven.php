<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["functie"] !== "Arts") {
    header("location: login.php");
    exit;
}
?>
<!doctype html>
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
$db = new PDO("mysql:host=localhost;dbname=HealthOne", "root", "");
$query = $db->prepare("SELECT * FROM medicijnen");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['verzenden'])) {
    $patient_id = $_GET['id'];
    $medicijn_id = filter_input(INPUT_POST, "medicijn", FILTER_SANITIZE_STRING);
    $herhaal = filter_input(INPUT_POST, "herhaal", FILTER_SANITIZE_STRING);
    $dosering = filter_input(INPUT_POST, "dosering", FILTER_SANITIZE_STRING);
    $omschrijving = filter_input(INPUT_POST, "omschrijving", FILTER_SANITIZE_STRING);
    $query = $db->prepare("INSERT INTO recepten(patient_id, medicijn_id, herhaal, dosering, omschrijving)
                           VALUES ('$patient_id','$medicijn_id','$herhaal', '$dosering', '$omschrijving')");
    if ($query->execute()) {
        header("Location: patient-gegevens.php?id=" . $patient_id);
    } else {
        echo "Er is een fout opgetreden";
    }
}
?>
<div class="jumbotron text-center">
    <h1>Health One</h1>
    <p>Informatie patient</p>
    <div class="container">
        <div class="progress">
            <div class="darkmode-ignore progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:66%"></div>
        </div>
    </div>
</div>

<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label>medicijn:</label><br>
            <select class="form-control" name="medicijn">
                <?php
                foreach ($result as &$data) {
                    echo "<option value='" . $data['id'] . "'>" . $data['naam'] . "</option>";
                }
                ?>
            </select>
            <br>
            <label>herhaalt:</label><br>
            <select class="form-control" name="herhaal" required>
                <option value="ja">Ja</option>
                <option value="nee">Nee</option>
            </select>
            <br>
            <label>dosering:</label><br>
            <input class="form-control" type="number" name="dosering" required>
            <br>
            <label>omschrijving:</label><br>
            <textarea class="form-control" name="omschrijving" required></textarea>
        </div>
        <input type="submit" name="verzenden">

    </form>
</div>

</body>
<link rel="stylesheet" href="css/darkmode.css">
<script src="darkmode.js"></script>

</html>