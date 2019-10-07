<?php
include "database.php";
$query = $db->prepare("DELETE FROM medicijnen WHERE medicijnen_id = :id");
echo var_dump($_GET["id"]);
$query->bindParam("id", $_GET["id"]);
$query->execute();
echo "<META HTTP-EQUIV ='Refresh' Content ='2; URL =medicijnen-lijst.php'>";
?>

<h1>Verwijderd!</h1>
