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
    $stmt = $pdo->prepare("UPDATE patient SET naam = :naam, leeftijd = :leeftijd, adres = :adres, email = :email, telefoonnummer = :telefoonnummer, verzekeringsnummer = :verzekeringsnummer, aandoeningen = :aandoeningen WHERE id = :id");
    // Bind parameters to statement
    $stmt->bindParam('id', $_GET['id']);
    $stmt->bindParam('naam', $_POST['naam']);
    $stmt->bindParam('leeftijd', $_POST['leeftijd']);
    $stmt->bindParam('adres', $_POST['adres']);
    $stmt->bindParam('email', $_POST['email']);
    $stmt->bindParam('telefoonnummer', $_POST['telefoonnummer']);
    $stmt->bindParam('verzekeringsnummer', $_POST['verzekeringsnummer']);
    $stmt->bindParam('aandoeningen', $_POST['aandoeningen']);
    
    
 
    // Execute the prepared statement
    $stmt->execute();
echo "<META HTTP-EQUIV ='Refresh' Content ='0; URL =patient-lijst.php'>";
    
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);
?>