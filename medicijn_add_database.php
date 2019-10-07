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
    //var_dump($_POST);die();
    if(!isset($_POST['herhaal']))
    {
        $_REQUEST['herhaal']="Nee";
    }
    else{
        $_REQUEST['herhaal']="Ja";
    }
        //var_dump($_POST);die();
        if(!isset($_POST['vergoed']))
        {
            $_REQUEST['vergoed']="Nee";
        }
        else{
            $_REQUEST['vergoed']="Ja";
        }
    // Create prepared statement
    $sql = "INSERT INTO medicijnen (medicijnen_id, naam, herhaal ,vergoed) VALUES (:medicijnen_id, :naam, :herhaal ,:vergoed);";
    $stmt = $pdo->prepare($sql);

    // Bind parameters to statement
    $stmt->bindParam(':medicijnen_id', $_REQUEST['medicijnen_id']);
    $stmt->bindParam(':naam', $_REQUEST['naam']);
    $stmt->bindParam(':herhaal', $_REQUEST['herhaal']);
    $stmt->bindParam(':vergoed', $_REQUEST['vergoed']);

    // Execute the prepared statement
    $stmt->execute();
    echo "<META HTTP-EQUIV ='Refresh' Content ='0; URL =medicijnen-lijst.php'>";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Close connection
unset($pdo);
?>