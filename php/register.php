<?php
// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "db");

if ($mysqli->connect_error) {
    die("Błąd połączenia z bazą danych " . $mysqli->connect_error);
}

// Get user input
$email = $_POST["login"];
$password = $_POST["password"];
$repeat_password = $_POST["check_pass"];

// Check if the email is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Nieprawidłowy adres email.");
}

// Check if the email already exists in the database
$check_email_query = "SELECT users.Email FROM users;";
$equal = $mysqli -> query($check_email_query);
$num_of_email = $equal -> num_rows;
$email_count = 0;

for($i = 0; $i < $num_of_email; $i++){
    $row = $equal -> fetch_assoc();
    if($row['Email'] == $email)
        $email_count++;
}

if ($email_count > 0) {
    die("Podany email już istnieje. Proszę użyj innego maila.");
}

// Check if the password and repeated password match
if ($password !== $repeat_password) {
    die("Hasła nie pasują do siebie");
}

// Check if the password meets certain criteria (e.g., at least 8 characters, including numbers, uppercase, and lowercase letters)
if (strlen($password) < 8 || !preg_match("/[0-9]/", $password) || !preg_match("/[a-z]/", $password) || !preg_match("/[A-Z]/", $password)) {
    die("Hasło musi spełniać następujące kryteria:<br>
        - Co najmniej 8 znaków długości<br>
        - Musi zawierać przynajmniej jedną cyfrę (0-9)<br>
        - Musi zawierać przynajmniej jedną małą literę (a-z)<br>
        - Musi zawierać przynajmniej jedną wielką literę (A-Z)");
}


// Hash the password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Insert user data into the database
$sql = "INSERT INTO users (Email, Password) VALUES (?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $email, $hashed_password);

if ($stmt->execute()) {
    echo "Rejestracja udana!";
} else {
    echo "Rejestracja nie powiodła się: " . $stmt->error;
}

// Close the database connection
$mysqli->close();
?>
