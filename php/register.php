<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "db");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Book your travel - Error</title>

    <meta name="description" content="Travel website">
	<meta name="keywords" content="travel, booking, map">
	<meta name="author" content="Patryk Ruzicki, Łukasz Stępień">
	
	<link href="../src/css/style.css" rel="stylesheet">
</head>
<body id="top">
    <header>
        <div id="logo">
            <a href="../index.html"><img src="../res/img/logo.png" alt="Logo Book your travel"></a>
        </div>
        <nav>
			<ol>
				<li><a href="../index.html">Strona główna</a></li>
				<li><a href="../src/html/login.php">Mój profil</a></li>
				<li><a href="../src/html/register.php">Rejestracja</a></li>
			</ol>
		</nav>
    </header>
    <main>
    <?php
        if ($mysqli->connect_error) {
            die("<div class='error'>Błąd połączenia z bazą danych " . $mysqli->connect_error . "</div>");
        }

        $email = $_POST["login"];
        $password = $_POST["password"];
        $repeat_password = $_POST["check_pass"];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("<div class='error'>Nieprawidłowy adres email.</div>");
        }

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
            die("<div class='error'>Podany email już istnieje. Proszę użyj innego maila.</div>");
        }

        if ($password !== $repeat_password) {
            die("<div class='error'>Hasła nie pasują do siebie</div>");
        }

        if (strlen($password) < 8 || !preg_match("/[0-9]/", $password) || !preg_match("/[a-z]/", $password) || !preg_match("/[A-Z]/", $password)) {
            die("<div class='error'>Hasło musi spełniać następujące kryteria:<br><ol>
                <li>Co najmniej 8 znaków długości</li>
                <li>Musi zawierać przynajmniej jedną cyfrę (0-9)</li>
                <li>Musi zawierać przynajmniej jedną małą literę (a-z)</li>
                <li>Musi zawierać przynajmniej jedną wielką literę (A-Z)</li></ol></div>");
        }

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (Email, Password) VALUES (?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ss", $email, $hashed_password);

        if ($stmt->execute()) {
            echo "<div class='corre'>Rejestracja udana!</div>";
        } else {
            echo "<div class='error'>Rejestracja nie powiodła się: " . $stmt->error . "</div>";
        }
    ?>
    </main>
</body>
</html>

<?php
$mysqli->close();
?>