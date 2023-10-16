<?php
// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "db");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get user input
$email = $_POST["login"];
$password = $_POST["password"];
$repeat_password = $_POST["check_pass"];

// Check if the email is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}

// Check if the password and repeated password match
if ($password !== $repeat_password) {
    die("Passwords do not match.");
}

// Check if the password meets certain criteria (e.g., at least 8 characters, including numbers, uppercase, and lowercase letters)
if (strlen($password) < 8 || !preg_match("/[0-9]/", $password) || !preg_match("/[a-z]/", $password) || !preg_match("/[A-Z]/", $password)) {
    die("Password must meet the following criteria:<br>
        - At least 8 characters in length<br>
        - Contains at least one digit (0-9)<br>
        - Contains at least one lowercase letter (a-z)<br>
        - Contains at least one uppercase letter (A-Z)");
}


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
