<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/index.css">
    <script src="../js/shoppingCart.js" defer></script>
    <title>Document</title>

</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./pages/signUp.html">SignUp</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./pages/signIn.html">SignIn</a>
              </li>              
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<?php 
session_start();

require "../php/db.php";

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
        // concatenate . because now resources is one folder above
        $src = "." . $src;
    
        echo "Price: " . $price . "<br>";
        echo "Image Source: " . $src . "<br><br>";
    }
} else {
    
    echo "No items found in your cart.";
}

$stmt->close();



?>

<body>

    <ul>
        <li><?php if(isset($price)){echo $price;} ?></li>
        <li></li>
    </ul>

    <div class="container">
        <div class="row">
          <div class="col">
            <img src="<?php if(isset($src)){echo $src;} ?>" style="width:350px; height:320px" >
            <h2><?php if(isset($price)){echo $price;}?></h2>
            <button type="button" name="button" class="btn btn-primary cartButton" data-price="10.56" data-src="./resources/5026662.jpg" >shoppingCartPlaceholder</button>
          </div>
        </div>
      </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>