<?php
/*
    require_once "db/DatabaseConn.php";

    $conn = new db\DatabaseConn();
*/

    // Connect to the database
    $mysqli = new mysqli("localhost", "root", "", "db");
    
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    
    // Get user input
    $email = $_POST["login"];
    $password = $_POST["password"];
    
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
    // Insert user data into the database
    $sql = "INSERT INTO users (Email, Password) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $email, $hashed_password);
    
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Registration failed: " . $stmt->error;
    }
    
    // Close the database connection
    $mysqli->close();
    ?>
    