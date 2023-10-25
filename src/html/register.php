<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Book your travel - Rejestrowanie</title>

    <meta name="description" content="Travel website">
	<meta name="keywords" content="travel, booking, map">
	<meta name="author" content="Patryk Ruzicki, Łukasz Stępień">
	
	<link href="../css/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../../favicon.ico">
</head>
<body id="top">
    <header>
        <div id="logo">
            <a href="../../index.html"><img src="../../res/img/logo.png" alt="Logo Book your travel"></a>
        </div>
        <nav>
			<ol>
				<li><a href="../../index.html">Strona główna</a></li>
				<li><a href="login.php">Mój profil</a></li>
				<li><a id="current" href="#">Rejestracja</a></li>
			</ol>
		</nav>
    </header>
    <main>
        <section id="back_form">
            <form action="../../php/register.php" method="post">
                <fieldset>
                    <legend>Rejestracja</legend>

                    <table>
                        <tr>
                            <td><label for="login">Email: </label></td>
                            <td><input type="email" name="login" id="login"></td>
                        </tr>
                        <tr>
                            <td><label for="password">Hasło: </label></td>
                            <td><input type="password" name="password" id="password"></td>
                        </tr>
                        <tr>
                            <td><label for="check_pass">Powtórz hasło: </label></td>
                            <td><input type="password" name="check_pass" id="check_pass"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" id="submit" value="Zatwierdź"></td>
                        </tr>
                    </table>
                </fieldset>
                <!-- <script src="../js/FormCheck.js"></script> -->
            </form>
        </section>
    </main>
</body>
</html>