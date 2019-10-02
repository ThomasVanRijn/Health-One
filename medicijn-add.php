<?php
include("database.php");
$db = new PDO("mysql:host=localhost;dbname=HealthOne", "root", "");
$query = $db->prepare("SELECT naam FROM medicijnen WHERE id = " . $_GET['id']);
$query->execute();
$mijnMedicijn = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($mijnMedicijn as $data) {
    echo $data["naam"];
}

?>