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
            <!-- <div class="trip">
                <div class="photo">
                    <img src="" alt="">
                </div>
                <div class="content">
                    <h3 class="title"></h3>
                    <hr>
                    <p class="trip_date"></p>
                </div>
                <div class="description">
                    
                </div>
            </div> -->
            <?php
            $mysqli = new mysqli("localhost", "root", "", "db");

            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            // Query to retrieve the trips for the logged-in user
            $query = "SELECT * FROM trips WHERE user_id = ?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $trip_id = $row['trip_id'];
                $title = $row['title'];
                $description = $row['description'];
                $photo_url = $row['photo_url'];

                echo '<div class="trip">';
                echo '<div class="photo">';
                echo '<img src="' . $photo_url . '" alt="' . $title . '">';
                echo '</div>';
                echo '<div class="content">';
                echo '<h3 class="title">' . $title . '</h3>';
                echo '<hr>';
                echo '<p class="trip_date">' . $description . '</p>';
                echo '</div>';
                echo '<div class="description">';
                echo '</div>';
                echo '</div>';
            }

            $mysqli->close();
            ?>

        </section>
    </main>
    <footer>
        <p>Stronę stworzono w 2023r.</p><p><a href="#top">Do poczatku strony</a></p>
    </footer>
    </body>
</html>