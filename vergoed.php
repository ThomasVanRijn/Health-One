<?php
include "database.php";
$query = $db->prepare("UPDATE recepten SET afgehaald = 1 WHERE id = :id");
$query->bindParam("id", $_GET["id"]);
$query->execute();
header("location: patient-gegevensApotheker.php")
?>