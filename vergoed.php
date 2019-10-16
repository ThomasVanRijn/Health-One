<?php
include "database.php";
$query = $db->prepare("DELETE FROM recepten WHERE id = :id");
echo var_dump($_GET["id"]);
$query->bindParam("id", $_GET["id"]);
$query->execute();
echo "<META HTTP-EQUIV ='Refresh' Content ='2; URL =patient-gegevensApotheker.php'>";
?>