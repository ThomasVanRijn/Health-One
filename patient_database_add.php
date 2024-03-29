<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    $pdo = new PDO("mysql:host=localhost;dbname=HealthOne", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Attempt insert query execution
try{
    // Create prepared statement
    $sql = "INSERT INTO patient (id, naam, leeftijd ,adres ,email, telefoonnummer, verzekeringsnummer, aandoeningen) VALUES (:id, :naam, :leeftijd ,:adres, :email, :telefoonnummer, :verzekeringsnummer, :aandoeningen);";
    $stmt = $pdo->prepare($sql);

    // Bind parameters to statement
    $stmt->bindParam(':id', $_REQUEST['id']);
    $stmt->bindParam(':naam', $_REQUEST['naam']);
    $stmt->bindParam(':leeftijd', $_REQUEST['leeftijd']);
    $stmt->bindParam(':adres', $_REQUEST['adres']);
    $stmt->bindParam(':email', $_REQUEST['email']);
    $stmt->bindParam(':telefoonnummer', $_REQUEST['telefoonnummer']);
    $stmt->bindParam(':verzekeringsnummer', $_REQUEST['verzekeringsnummer']);
    $stmt->bindParam(':aandoeningen', $_REQUEST['aandoeningen']);

    // Execute the prepared statement
    $stmt->execute();
    echo "<META HTTP-EQUIV ='Refresh' Content ='0; URL =patient-lijst.php'>";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Close connection
unset($pdo);
?>