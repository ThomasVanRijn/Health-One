<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=HealthOne", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

try{

    if(!isset($_POST['vergoed'])) {
        $_REQUEST['vergoed']="Nee";
    } else {
        $_REQUEST['vergoed']="Ja";
    }

    $sql = "INSERT INTO medicijnen (id, naam, vergoed) VALUES (:id, :naam,:vergoed);";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $_REQUEST['id']);
    $stmt->bindParam(':naam', $_REQUEST['naam']);
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