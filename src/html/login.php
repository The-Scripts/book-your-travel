<?php
    session_start();

    if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){
        header('Location: ../../php/dashboard.php');
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Book your travel - Logowanie</title>

    <meta name="description" content="Travel website">
	<meta name="keywords" content="travel, booking, map">
	<meta name="author" content="Patryk Ruzicki, Łukasz Stępień">
	
	<link href="../css/style.css" rel="stylesheet">
</head>
<body id="top">
    <header>
        <div id="logo">
            <a href="../../index.html"><img src="../../res/img/logo.png" alt="Logo Book your travel"></a>
        </div>
        <nav>
			<ol>
				<li><a href="../../index.html">Strona główna</a></li>
				<li><a id="current" href="#">Mój profil</a></li>
				<li><a href="register.php">Rejestracja</a></li>
			</ol>
		</nav>
    </header>
    <main>
        <section id="back_form">
            <form action="../../php/login.php" method="post">
                <fieldset>
                    <legend>Logowanie</legend>

                    <table>
                        <tr>
                            <td><label for="login">Email: </label></td>
                            <td><input type="text" name="login" id="login"></td>
                        </tr>
                        <tr>
                            <td><label for="password">Hasło: </label></td>
                            <td><input type="password" name="password" id="password"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" id="submit" value="Zatwierdź"></td>
                        </tr>
                    </table>
                </fieldset>
            </form>
        </section>
    </main>
    <footer>
        <p>Stronę stworzono w 2023r.</p><p><a href="#top">Do poczatku strony</a></p>
    </footer>
</body>
</html>