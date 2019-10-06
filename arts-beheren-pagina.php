<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
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
$query = $db->prepare("SELECT * FROM artsen");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="jumbotron text-center">
    <h1>Health One</h1>
    <p>Zoek de arts die u wilt beheren</p>

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
                    <th>Adres</th>
                    <th>Email</th>
                    <th>Wijzig</th>
                </tr>
                </thead>
                <tbody id="myTable">
                <?php
                foreach ($result as &$data) {
                    echo "<tr>";
                    echo "<td>" . $data["naam"] . "</td>";
                    echo "<td>" . $data["adres"] . "</td>";
                    echo "<td>" . $data["email"] . "</td>";
                    echo "<td>" . "<a href='Arts-gegevens-wijzigen.php?id=" . $data['id'] . "'>" . "<button type='button' class='btn btn-success '>" . "Arts gegevens wijzigen" . "</button>" . "</a>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
            <a href="arts_add.html"><button type="button" class="btn btn-success">Arts toevoegen</button></a>
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