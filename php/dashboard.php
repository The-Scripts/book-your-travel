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
            //$current_user = $_SESSION['user_id'];
            $query = "SELECT offers.*, imgs.Image FROM offers, bookedtravels, users, imgs WHERE users.ID = bookedtravels.UserID AND bookedtravels.OfferID = offers.ID AND offers.ID = imgs.OfferID AND users.ID = 1;";

            $result = $mysqli -> query($query);
            $num_of_email = $result -> num_rows;

            for($i = 0; $i < $num_of_email; $i++){
                $row = $result -> fetch_assoc();

                $trip_start = $row['StartDate'];
                $trip_end = $row['EndDate'];
                $title = $row['Title'];
                $description = $row['Description'];
                $photo_url = $row['Image'];

                echo '<div class="trip">';
                echo '<img src="' . $photo_url . '" alt="' . $title . '">';
                echo '<div class="content">';
                echo '<h3 class="title">' . $title . '</h3>';
                echo '<p class="trip_date">' . $trip_start . ' - ' . $trip_end . '</p>';
                echo '</div>';
                echo '<div class="description">';
                echo $description;
                echo "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora blanditiis quos, itaque saepe facilis, eligendi provident sed exercitationem maxime labore quidem dignissimos laborum voluptas perferendis ipsum. Minus, neque similique! Harum.
                Modi hic nisi enim. Consequuntur ab necessitatibus provident delectus architecto! Eligendi, excepturi accusantium impedit ipsam quos iusto. Quis qui alias, obcaecati temporibus reiciendis soluta aperiam eligendi quam animi asperiores enim.
                Dolorum accusantium repudiandae at possimus cum consequatur facere veritatis sit sunt eveniet, corrupti quidem repellat nihil blanditiis cumque doloremque quasi autem harum fugit esse temporibus magni iure? Porro, hic vitae?
                Similique voluptatem quia corporis soluta. Esse harum excepturi, a ullam aspernatur repudiandae tempore labore commodi, fugiat debitis quis voluptatem. Totam repellat architecto alias recusandae explicabo enim corrupti maxime, quisquam dolorum.
                Aperiam, aut sunt! Tempora culpa consequatur accusamus, iure vitae maxime quidem quis nostrum aspernatur atque veniam pariatur impedit libero perspiciatis praesentium corrupti, nemo velit harum deleniti nesciunt minus id rem?
                Placeat molestiae delectus, fugit recusandae optio ratione dicta rerum nam in dolore cumque ipsum commodi quis quos aspernatur culpa nobis dolorem aut, perspiciatis distinctio ea. Veritatis obcaecati voluptatibus deleniti accusantium!
                Facere, enim laboriosam repellat voluptates pariatur tempora temporibus dolor? Deserunt qui quidem dolorem aut magnam quas numquam quam, sed porro expedita, velit est voluptatem quos dolores quasi veritatis enim maxime.
                Aliquam, consectetur laudantium. Velit assumenda beatae dolore. Provident dolor, ea blanditiis dolorum eius incidunt molestiae veritatis rem, eveniet culpa quos neque debitis consequuntur. Harum voluptatem placeat reprehenderit, dolores recusandae facilis.
                Maxime possimus quis dolorum eius explicabo fugit voluptates recusandae minus, error laborum aspernatur distinctio. Officia velit quibusdam aliquid? Laborum sapiente eveniet modi autem quibusdam voluptas alias sed accusantium explicabo cupiditate.
                Repellat nihil natus doloremque voluptate ipsam esse, ratione provident dolores ea ipsa illo. Non minus est enim quae consequatur harum quisquam natus itaque distinctio doloribus, eveniet possimus culpa earum tenetur!";
                echo '</div></div>';

                echo '<div class="trip">';
                echo '<img src="' . $photo_url . '" alt="' . $title . '">';
                echo '<div class="content">';
                echo '<h3 class="title">' . $title . '</h3>';
                echo '<p class="trip_date">' . $trip_start . ' - ' . $trip_end . '</p>';
                echo '</div>';
                echo '<div class="description">';
                echo $description;
                echo "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora blanditiis quos, itaque saepe facilis, eligendi provident sed exercitationem maxime labore quidem dignissimos laborum voluptas perferendis ipsum. Minus, neque similique! Harum.
                Modi hic nisi enim. Consequuntur ab necessitatibus provident delectus architecto! Eligendi, excepturi accusantium impedit ipsam quos iusto. Quis qui alias, obcaecati temporibus reiciendis soluta aperiam eligendi quam animi asperiores enim.
                Dolorum accusantium repudiandae at possimus cum consequatur facere veritatis sit sunt eveniet, corrupti quidem repellat nihil blanditiis cumque doloremque quasi autem harum fugit esse temporibus magni iure? Porro, hic vitae?
                Similique voluptatem quia corporis soluta. Esse harum excepturi, a ullam aspernatur repudiandae tempore labore commodi, fugiat debitis quis voluptatem. Totam repellat architecto alias recusandae explicabo enim corrupti maxime, quisquam dolorum.
                Aperiam, aut sunt! Tempora culpa consequatur accusamus, iure vitae maxime quidem quis nostrum aspernatur atque veniam pariatur impedit libero perspiciatis praesentium corrupti, nemo velit harum deleniti nesciunt minus id rem?
                Placeat molestiae delectus, fugit recusandae optio ratione dicta rerum nam in dolore cumque ipsum commodi quis quos aspernatur culpa nobis dolorem aut, perspiciatis distinctio ea. Veritatis obcaecati voluptatibus deleniti accusantium!
                Facere, enim laboriosam repellat voluptates pariatur tempora temporibus dolor? Deserunt qui quidem dolorem aut magnam quas numquam quam, sed porro expedita, velit est voluptatem quos dolores quasi veritatis enim maxime.
                Aliquam, consectetur laudantium. Velit assumenda beatae dolore. Provident dolor, ea blanditiis dolorum eius incidunt molestiae veritatis rem, eveniet culpa quos neque debitis consequuntur. Harum voluptatem placeat reprehenderit, dolores recusandae facilis.
                Maxime possimus quis dolorum eius explicabo fugit voluptates recusandae minus, error laborum aspernatur distinctio. Officia velit quibusdam aliquid? Laborum sapiente eveniet modi autem quibusdam voluptas alias sed accusantium explicabo cupiditate.
                Repellat nihil natus doloremque voluptate ipsam esse, ratione provident dolores ea ipsa illo. Non minus est enim quae consequatur harum quisquam natus itaque distinctio doloribus, eveniet possimus culpa earum tenetur!";
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