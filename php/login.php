<?php
// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "db");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get user input
$email = $_POST["login"];
$password = $_POST["password"];

// Check if the email is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}

// Retrieve the user's hashed password from the database
$retrieve_password_query = "SELECT ID, Email, Password FROM users WHERE Email = ?";
$stmt = $mysqli->prepare($retrieve_password_query);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 1) {
    $stmt->bind_result($user_id, $user_email, $hashed_password);
    $stmt->fetch();

    // Verify the password
    if (password_verify($password, $hashed_password)) {
        // Password is correct, user is authenticated

        // Start a session and store user data
        session_start();
        $_SESSION["user_id"] = $user_id;
        $_SESSION["user_email"] = $user_email;

        header("Location: dashboard.php"); // Redirect to the user's dashboard or another protected page
    } else {
        die("Incorrect password.");
    }
} else {
    die("Email not found. Please register if you don't have an account.");
}

// Close the database connection
$mysqli->close();
?>
