<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Book your travel - Strona główna</title>

    <meta name="description" content="Travel website">
	<meta name="keywords" content="travel, booking, map">
	<meta name="author" content="Patryk Ruzicki, Łukasz Stępień">
	
	<link href="../src/css/style.css" rel="stylesheet">
    <link href="../src/css/dashboard.css" rel="stylesheet">
</head>
<body id="top" style="overflow: auto;">
    <header>
        <div id="logo">
            <img src="../res/img/logo.png" alt="Logo Book your travel">
        </div>
        <nav>
			<ol>
				<li><a href="../index.html">Strona główna</a></li>
				<li><a id="current" href="#">Mój profil</a></li>
				<li><a href="../src/html/register.html">Rejestracja</a></li>
			</ol>
		</nav>
    </header>
    <main>
        <header id="sub_menu">
            <button id="upcoming">Nadchodzące</button>
            <button id="previous">Zakończone</button>
        </header>
        <section>
            <div class="trip">
                <div class="photo">
                    <img src="../res/img/zdj.png" alt="Mirów Fotka">
                </div>
                <div class="content">
                    <h3>Wycieczka wspinaczkowa | Mirów</h3>
                    <hr>
                </div>
                <div class="description">
                        <p class="trip_date">06.10.2023 - 22.12.2023</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor error, enim, iure deleniti ut neque atque, deserunt consectetur molestias itaque soluta blanditiis animi nulla sunt culpa repellendus tempore? Officia, deleniti.</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor error, enim, iure deleniti ut neque atque, deserunt consectetur molestias itaque soluta blanditiis animi nulla sunt culpa repellendus tempore? Officia, deleniti.</p>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>Stronę stworzono w 2023r.</p><p><a href="#top">Do poczatku strony</a></p>
    </footer>
    </body>
</html>