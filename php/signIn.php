<?php

require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    if (isset($email) && isset($password)) {
        echo "email:" . $email;
        echo "<br></br>";
        echo "password:" . $password;

        $sql = "SELECT password FROM customer WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if email exists in the database
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $dbPassword = $row['password']; // Plain text password from DB

            // Direct comparison since passwords are not hashed
            if ($password === $dbPassword) {  
                session_start();
                $_SESSION['email'] = $email;
                echo "Successful login";
                header("Location: ../index.html?WelcomeUser");
                exit();
            } else {
                echo "Invalid password";
                header("Location: ../pages/signIn.html?error=invalid_credentials&email=");
                // header("Location: ../pages/signIn.html?error=invalid_credentials&email=" . urlencode($email));
                exit();
            }
        } else {
            echo "Email not found";
            header("Location: ../pages/signIn.html?error=no_account");
            exit();
        }
    }
}
