<?php
include("database.php");
$db = new PDO("mysql:host=localhost;dbname=HealthOne", "root", "");
$query = $db->prepare("SELECT naam FROM medicijnen WHERE id = " . $_GET['id']);
$query->execute();
$mijnMedicijn = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($mijnMedicijn as $data) {
    $query2 = $db->prepare("INSERT INTO patient  VALUES (:naam) WHERE id = :id");
    $query2->bindParam(":id", $_GET["id"]);
    $query2->bindParam(":naam", $data["naam"]);
    $query2->execute();
}

?>