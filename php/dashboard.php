<?php
    session_start();

    if(!(isset($_SESSION['user_id'])) && !($_SESSION['user_email'])){
        header("Location: ../src/html/login.php");
    }
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
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
</head>
<body id="top" style="overflow: auto;">
    <header>
        <div id="logo">
            <a href="../index.html"><img src="../res/img/logo.png" alt="Logo Book your travel"></a>
        </div>
        <nav>
			<ol>
				<li><a href="../index.html">Strona główna</a></li>
				<li><a id="current" href="#">Mój profil</a></li>
				<li><a id="logout" href="dashboard.php?action=logout">Wyloguj</a></li>
                <?php
                    if (isset($_GET['action']) && $_GET['action'] === 'logout') {

                        unset($_SESSION['user_id']);
                        unset($_SESSION['user_email']);
                        echo "Zostałeś wylogowany.";

                        header('Location: ../src/html/login.php');
                    }
                ?>
			</ol>
		</nav>
    </header>
    <main>
        <header id="sub_menu">
            <button id="btnAll">Wszystkie</button>
            <button id="btnNext">Nadchodzące</button>
            <button id="btnPrev">Zakończone</button>
        </header>
        <section>
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
                
                echo '<section>';
                echo '<div class="trip">';
                echo '<div class="photo">';
                echo '<img src="' . $photo_url . '" alt="' . $title . '">';
                echo '</div>';
                echo '<div class="content">';
                echo '<h3 class="title">' . $title . '</h3>';
                echo '<p class="trip_date">' . $start_sf_date . ' - ' . $end_sf_date;
                if ($data_porownywana > $dzisiaj) {
                    echo "<span class='tag'>Nadchodzące</span>";
                } elseif ($data_porownywana < $dzisiaj) {
                    echo "<span class='tag'>Ukończone</span>";
                } else {
                    echo "<span class='tag' class='today'>Nadchodzące</span>";
                }
                echo '</p></div>';
                echo '<div class="description">';
                echo $description;
                echo '</div></div></section>';
            }

            $mysqli->close();
            ?>

        </section>
    </main>
    <footer>
        <p>Stronę stworzono w 2023r.</p><p><a href="#top">Do poczatku strony</a></p>
    </footer>
    <script src="../src/js/dashboard.js"></script>
    </body>
</html>