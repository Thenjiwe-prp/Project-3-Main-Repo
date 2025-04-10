<?php

$serverName = "localhost";  
$username = "root";        
$password = "";             
$dbName = "Ecommerce";  

$conn = new mysqli($serverName, $username, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected to " . $dbName . " successfully";
echo "<br></br>";

// require db.php - gives access to all these variables  - conn is the one neeeded to send sql


//session_start();
//$sessionID = session_id();
//echo $sessionID;
?>

