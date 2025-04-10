<?php
session_start();

require "db.php";

$email = $_SESSION["email"];

 $sql = "SELECT price,src FROM cart WHERE email = ?";
 $stmt = $conn->prepare($sql);
 $stmt->bind_param("s", $email);
 $stmt->execute();
 $result = $stmt->get_result();

 if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        
        $price = $row['price'];
        $src = $row['src'];

    
        echo "Price: " . $price . "<br>";
        echo "Image Source: " . $src . "<br><br>";
    }
} else {
    
    echo "No items found in your cart.";
}

$stmt->close();



?>