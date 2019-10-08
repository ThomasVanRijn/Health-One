<?php
include "database.php";
$query = $db->prepare("DELETE FROM users WHERE id = :id");
echo var_dump($_GET["id"]);
$query->bindParam("id", $_GET["id"]);
$query->execute();
echo "<META HTTP-EQUIV ='Refresh' Content ='2; URL =arts-beheren-pagina.php'>";
?>

<h1>Verwijderd!</h1>
