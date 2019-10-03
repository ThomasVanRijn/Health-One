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
    $sql = "INSERT INTO artsen (naam, adres ,email, telefoonnummer) VALUES (:naam, :adres ,:email, :telefoonnummer);";
    $stmt = $pdo->prepare($sql);

    // Bind parameters to statement

    $stmt->bindParam(':naam', $_REQUEST['naam']);
    $stmt->bindParam(':adres', $_REQUEST['adres']);
    $stmt->bindParam(':email', $_REQUEST['email']);
    $stmt->bindParam(':telefoonnummer', $_REQUEST['telefoonnummer']);

    // Execute the prepared statement
    $stmt->execute();
    echo "<META HTTP-EQUIV ='Refresh' Content ='0; URL =arts-beheren-pagina.php'>";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Close connection
unset($pdo);
?>