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

$data = json_decode(file_get_contents("php://input"), true);

// Check if data exists
if ($data) {
    echo "Received Name: " . $data["name"] . ", Age: " . $data["age"];
} else {
    echo "No data received";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {




      $userID = "test";
      $src = "test";
      $price = 123;


   
    if (isset($src) && isset($price)&& isset($userID)) {
        
        $sql = "INSERT INTO cart(email,src,price) VALUES(?,?,?)";

        $stmt->bind_param("sss", $userID, $src, $price);

        if ($stmt->execute()) {

            echo "cart item added to db";

        } else {
            echo $stmt->error;
        }

    } 


}


?>