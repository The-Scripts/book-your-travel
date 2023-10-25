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
                <li><a href="../contact.html">Kontakt</a></li>
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

        @$email = $_POST["login"];
        @$password = $_POST["password"];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //header('Location: ../src/html/login.html');
            die("<div class='error'>Niepoprawny adres email.</div>");
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
                die("<div class='error'>Niepoprawne hasło.</div>");
            }
        } else {
            //header('Location: ../src/html/login.html');
            die("<div class='error'>Nie znaleziono emaila. Proszę zarejestruj się, jeżeli nie masz stworzonego konta.</div>");
        }
    ?>
    </main>
</body>
</html>

<?php
$mysqli->close();
?>