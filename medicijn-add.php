<?php
include("database.php");
$db = new PDO("mysql:host=localhost;dbname=HealthOne", "root", "");
$query = $db->prepare("SELECT naam FROM medicijnen WHERE id = " . $_GET['id']);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $data) {
    echo $data["naam"];
}

?>