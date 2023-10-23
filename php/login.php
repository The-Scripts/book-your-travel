<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "db");

if ($mysqli->connect_error) {
    die("Błąd połączenia z bazą danych " . $mysqli->connect_error);
}

$email = $_POST["login"];
$password = $_POST["password"];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //header('Location: ../src/html/login.html');
    die("Niepoprawny adres email.");
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
        //header('Location: ../src/html/login.html');
        die("Niepoprawne hasło.");
    }
} else {
    //header('Location: ../src/html/login.html');
    die("Nie znaleziono emaila. Proszę zarejestruj się, jeżeli nie masz stworzonego konta.");
}

// Close the database connection
$mysqli->close();
?>
