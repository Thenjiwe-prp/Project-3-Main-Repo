<?php

require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];

    if (isset($email) && isset($password)) {
        echo "email:" . $email;
        echo "<br></br>";
        echo "password:" . $password;
        echo "<br></br>";
        echo "success values!";
        echo "<br></br>";

        $sql = "INSERT INTO customer(email, password , name ,surname) VALUES(?,?,?,?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("ssss", $email, $password, $name, $surname);

        if ($stmt->execute()) {

            echo "record inserted successfully";
            header("Location: ../pages/signIn.html");
            exit();

        } else {
            echo $stmt->error;
        }

    } else {
        echo "isset error, signUp submit gave no values";
    }


}





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



?>