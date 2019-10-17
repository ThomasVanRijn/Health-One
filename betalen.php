<?php
include "database.php";
$query = $db->prepare("UPDATE recepten SET betaald = 1 WHERE id = :id");
$query->bindParam("id", $_GET["id"]);
$query->execute();
header("location: patient-gegevens-verzekeraar.php")
?>