<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "db");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$email = $_POST["login"];
$password = $_POST["password"];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}

$retrieve_password_query = "SELECT ID, Email, Password FROM users WHERE Email = ?";
$stmt = $mysqli->prepare($retrieve_password_query);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 1) {
    $stmt->bind_result($user_id, $user_email, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        $_SESSION["user_id"] = $user_id;
        $_SESSION["user_email"] = $user_email;

        header("Location: dashboard.php");
    } else {
        die("Incorrect password.");
    }
} else {
    die("Email not found. Please register if you don't have an account.");
}

// Close the database connection
$mysqli->close();
?>
