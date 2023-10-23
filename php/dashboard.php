<?php
    session_start();
?>
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
                <img src="" alt="">
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
            $current_user = $_SESSION['user_id'];
            $query = "SELECT offers.*, imgs.Image FROM offers, bookedtravels, users, imgs WHERE users.ID = bookedtravels.UserID AND bookedtravels.OfferID = offers.ID AND offers.ID = imgs.OfferID AND users.ID = $current_user;";

            $result = $mysqli -> query($query);
            $num_of_email = $result -> num_rows;

            for($i = 0; $i < $num_of_email; $i++){
                $row = $result -> fetch_assoc();

                $trip_start = $row['StartDate'];
                $start_sf_date = date("d.m.Y", strtotime($trip_start));
                $trip_end = $row['EndDate'];
                $end_sf_date = date("d.m.Y", strtotime($trip_end));
                $title = $row['Title'];
                $description = $row['Description'];
                $photo_url = $row['Image'];

                $dzisiaj = new DateTime();
                $data_porownywana = new DateTime($trip_start);

                echo '<div class="trip">';
                echo '<div class="photo">';
                echo '<img src="' . $photo_url . '" alt="' . $title . '">';
                echo '</div>';
                echo '<div class="content">';
                echo '<h3 class="title">' . $title . '</h3>';
                echo '<p class="trip_date">' . $start_sf_date . ' - ' . $end_sf_date . '</p>';
                if ($data_porownywana > $dzisiaj) {
                    echo "<p class='tag'>Nadchodzące</p>";
                } elseif ($data_porownywana < $dzisiaj) {
                    echo "<p class='tag'>Ukończone</p>";
                } else {
                    echo "<p class='tag' class='today'>Nadchodzące</p>";
                }
                echo '</div>';
                echo '<div class="description">';
                echo $description;
                echo '</div></div>';
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