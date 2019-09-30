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
include ("database.php");
$query = $db->prepare("SELECT * FROM artsen");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Naam</th>
            <th>Adres</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody id="myTable">
        <?php
        foreach($result as &$data) {
            echo "<tr>";
            echo "<td>"  . "<a href='patient-zoekpagina.php'>" . $data["naam"]  . "</td>";
            echo "<td>" . $data["adres"] . "</td>";
            echo "<td>" . $data["email"] . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>