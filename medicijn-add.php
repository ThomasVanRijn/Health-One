<?php
include("database.php");
$db = new PDO("mysql:host=localhost;dbname=HealthOne", "root", "");
$query = $db->prepare("SELECT naam FROM medicijnen WHERE medicijnen_id = " . $_GET['medicijnen_id']);
$query->execute();
$mijnMedicijn = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($mijnMedicijn as $data) {
    $query2 = $db->prepare("INSERT INTO patient (kuurtje) VALUES (:naam) WHERE id = :id2");
    $query2->bindParam(":id2", $_GET["id2"]);
    $query2->bindParam(":naam", $data["naam"]);
    $query2->execute();
}

?>