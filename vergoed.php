<?php
include "database.php";
$query = $db->prepare("DELETE FROM medicijnen WHERE id = :id");
$query->bindParam("id", $_POST["id"]);
$query->execute();
echo "<META HTTP-EQUIV ='Refresh' Content ='2; URL =patient-gegevensApotheker.php'>";
?>