<?php

/* 
 CREATE TABLE customer (
    email VARCHAR(191) PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100),
    surname VARCHAR(100)
);

INSERT INTO customer (email, password, name, surname) 
        VALUES ('$email', '$password', '$name', '$surname');
*/

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

$email = $_POST["email"];
$password = $_POST["password"];
$name = $_POST["name"];
$surname = $_POST["surname"];

if (isset($email) && isset($password)) {
    echo "email:" . $email;
    echo "<br></br>";
    echo "password:" . $password;
    echo "<br></br>";
} else {
    echo "isset error, signUp submit gave no values";
}


$sql = "INSERT INTO customer(email, password , name ,surname) VALUES(?,?,?,?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ssss", $email, $password , $name , $surname);

if($stmt->execute()){

    echo "record inserted successfully";

}else{
    echo $stmt->error;
}