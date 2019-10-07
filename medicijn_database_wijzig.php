<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["functie"] !== "verzekering") {
    header("location: login.php");
    exit;
}
?>
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
    $stmt = $pdo->prepare("UPDATE medicijnen SET naam = :naam, herhaal = :herhaal, vergoed = :vergoed WHERE id = :id");
 
    // Bind parameters to statement
    $stmt->bindParam('id', $_GET['id']);
    $stmt->bindParam('naam', $_POST['naam']);
    $stmt->bindParam('herhaal', $_POST['herhaal']);
    $stmt->bindParam('vergoed', $_POST['vergoed']);
    
 
    // Execute the prepared statement
    $stmt->execute();
echo "<META HTTP-EQUIV ='Refresh' Content ='0; URL =medicijnen-lijst.php'>";
    
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);
?>