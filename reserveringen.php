<?php
session_start();
$selectedTime = '';
/** @var mysqli $db */
require_once "connection/connection.php";

if (isset($_POST['submit'])) {


// Get form data
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $guests = $_POST['guests'];
    $time = $_POST ['time'];
    $comments = $_POST ['comments'];
    $selectedTime = mysqli_real_escape_string($db, $_POST['time']);
    $date = mysqli_escape_string($db, $_POST['date']);
    $endTime = date('H:i', strtotime($selectedTime . ' 2hours'));

// Server-side validation

    $errors = [];

    if ($guests === '') {
        $errors['guests'] = 'Gasten mogen niet leeg zijn';
    } else {
        if (is_string($guests) < 8) {
            $errors['guests'] = 'Maximaal 8 gasten';
        }
    }

    if ($phone === '') {
        $errors['phone'] = 'Telefoonnummer mag niet leeg zijn';
    }

    if ($email === '') {
        $errors['email'] = 'E-mail mag niet leeg zijn';
    }

    if ($time === '') {
        $errors['time'] = 'Tijdstip mag niet leeg zijn';
    }

    if ($name === '') {
        $errors['name'] = 'Naam mag niet leeg zijn';
    }


    if (empty($errors)) {

        // store the new user in the database.
        $query = "INSERT INTO `reservations`(`email`,`phone`, `name`, `guests`, `date`, `comments`, `start_time`, `end_time`) 
              VALUES ('$email','$phone','$name','$guests','$date','$comments','$selectedTime','$endTime')";

        $result = mysqli_query($db, $query)
        or exit('Error ' . mysqli_error($db) . ' with query ' . $query);

        mysqli_close($db);
        // If query succeeded
        if ($result) {

            // Redirect to home page
            header('location: homepage.php');
            // Exit the code
            exit;
        }
    }
}

if (isset($_GET['date']) && !empty($_GET['date'])) {
    // Haal de datum op
    $date = $_GET['date'];

    // Haal de reserveringen uit de database voor een specifieke datum
    $query = "SELECT * FROM reservations
                WHERE date = '$date'";
    $result = mysqli_query($db, $query);
    if ($result) {
        $reservations = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $reservations[] = $row;
        }
    }
    // Maak een array met tijden van 11:00 - 20:00 met stappen van 15 minuten.
    $times = [];
    $time = strtotime('11:00');
    $timeToAdd = 15;

    // Blijf de times array vullen totdat 20:00 bereikt wordt.
    while ($time <= strtotime(datetime: '20:00')) {
        // time toevoegen aan times array
        $times[] = date('H:i', $time);

        // time + een kwartier optellen
        $time += 15 * 60;
    }


    // Doorloop alle reserveringen en filter alle tijden die gelijk zijn
    // aan de tijd van een reservering t/m een uur later.
    // Zet alle overgebleven tijden in de array $availableTimes.
    $availableTimes = [];

    // doorloop alle tijden (van 11:00 - 20:00)
    foreach ($times as $time) {
        $time = strtotime($time);
        $occurs = false;
        $reservationCounter = 1;
        // controleer de tijd tegen ALLE reserveringen van die dag
        foreach ($reservations as $reservation) {
            $startTime = strtotime($reservation['start_time']);
            $endTime = strtotime($reservation['end_time']);
            // ALS de tijd van de begintijd tot de eindtijd van
            // een reservering valt voeg deze tijd ($time) niet
            // toe aan availableTimes
            if ($time >= $startTime && $time < $endTime) {
                $occurs = true;
                $reservationCounter++;
            }
        }
        if (!$occurs || $reservationCounter <= 6) {
            $availableTimes[] = date('H:i', $time);
        }
    }

} else {
    header('Location: select-date.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"
    >
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.cdnfonts.com/css/imagination-station" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/open-sans" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
            type="text/javascript"></script>
    <title>Broers Smaakmakers</title>
</head>

<body>

<nav class="navbar has-background-info" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item">
            <figure class="image is-32x32">
                <a href="homepage.php" target="_self"><img class="is-rounded" src="Images/BroersLogo.png"
                                                           alt="Logo"/></a>
            </figure>
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="nav-bar">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <script>
                document.addEventListener('DOMContentLoaded', () => {

                    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

                    $navbarBurgers.forEach(el => {
                        el.addEventListener('click', () => {

                            const target = el.dataset.target;
                            const $target = document.getElementById(target);

                            el.classList.toggle('is-active');
                            $target.classList.toggle('is-active');

                        });
                    });

                });
            </script>
        </a>
    </div>

    <div class="navbar-menu" id="nav-bar">
        <div class="navbar-end">
            <a href="menu.php" class="navbar-item is-link">
                Ons Menu
            </a>

            <a href="reserveringen.php" class="navbar-item is-link">
                Reserveer
            </a>

            <a href="contact.php" class="navbar-item is-link">
                Contact
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Meer
                </a>

                <div class="navbar-dropdown">
                    <a href="aanbod.php" class="navbar-item">
                        Ons Aanbod
                    </a>
                    <a href="evenementen.php" class="navbar-item">
                        Onze Evenementen
                    </a>
                    <a href="arrangementen.php" class="navbar-item">
                        Onze Arrangementen
                    </a>
                    <a href="reviewspage.php" class="navbar-item">
                        Reviews
                    </a>
                </div>
            </div>
        </div>
        <?php if (empty($_SESSION)) : ?>
            <div class="buttons">
                <a href="login.php" class="button is-primary is-outlined">
                    Log In
                </a>
            </div>
        <?php elseif (isset($_SESSION['admin_flag'])): ?>
            <?php if ($_SESSION['admin_flag'] == 1): ?>
                <div class="buttons">
                    <a href="admin.php" class="button is-primary is-outlined">
                        Admin
                    </a>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="buttons">
                <a href="logout.php" class="button is-link is-outlined">
                    Log Out
                </a>
            </div>
        <?php endif; ?>

    </div>

</nav>

<header class="background-image is-primary is-medium">
    <section class="hero is-height">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-1 shadow has-text-link">Reserveren voor <?= date('j F Y', strtotime($date)) ?></h1>
            </div>
        </div>
    </section>
</header>

<main class="has-background-info pt-0">

    <div class="container content is-flex is-justify-content-center">
        <section class="columns">
            <form class="column is-full" action="" method="post">
                <div class="pt-5"></div>
                <!--email -->
                <label class="label" for="email">E-mail</label>
                <input class="input is-link" id="email" type="text" name="email"
                       value="<?= $email ?? '' ?>"/>
                <p class="help is-danger">
                    <?= $errors['email'] ?? '' ?>
                </p>
                <!-- phone -->

                <label class="label" for="phone">Telefoonnummer</label>
                <input class="input is-link" id="phone" type="text" name="phone"
                       value="<?= $phone ?? '' ?>"/>
                <p class="help is-danger">
                    <?= $errors['phone'] ?? '' ?>
                </p>

                <!-- name -->

                <label class="label" for="name">Naam</label>
                <label for="name"></label>
                <input class="input is-link" id="name" type="text" name="name"
                       value="<?= $name ?? '' ?>"/>
                <p class="help is-danger">
                    <?= $errors['name'] ?? '' ?>
                </p>

                <!-- Guests -->

                <label class="label" for="guests">Aantal Gasten</label>
                <input class="input is-link" id="guests" type="text" name="guests"
                       value="<?= $guests ?? '' ?>"/>
                <p class="help is-danger">
                    <?= $errors['guests'] ?? '' ?>
                </p>

                <!--time -->

                <label class="label" for="time">Tijd</label>
                <select id="time" name="time">
                    <option value="">Kies een tijd</option>
                    <?php foreach ($availableTimes as $availableTime) { ?>
                        <option value="<?= $availableTime ?>" <?= $selectedTime == $availableTime ? 'selected' : '' ?>><?= $availableTime ?></option>
                    <?php } ?>
                </select>
                <p class="help is-danger">
                    <?= $errors['time'] ?? '' ?>
                </p>

                <input type="hidden" name="date" value="<?= $date ?>"/>

                <!-- Extra informatie -->

                <label class="label" for="comments">Extra informatie</label>

                <textarea class="is-normal textArea" cols="89" rows="6" name="comments"></textarea>

                <p class="help is-danger">
                    <?= $errors['comments'] ?? '' ?>
                </p>

                <!-- Submit -->

                <button class="button is-link is-outlined is-fullwidth" type="submit" name="submit">Reserveren
                </button>
            </form>

        </section>
    </div>


</main>


<footer class="has-background-info">
    <div class="footerRow">
        <div><p>Follow Us!</p>
            <a href="https://www.instagram.com/broers.ridderkerk">
                <i class="fa fa-instagram" style="font-size:30px"></i>
            </a>

            <a href="https://www.facebook.com/profile.php?id=61562490741128">
                <i class="fa fa-facebook-square" style="font-size:30px"></i>
            </a>
        </div>
        <div>
            <div class="openingstijdenOnder"><h3>Openingstijden</h3>
                <div class="openingstijdenSamen">
                    <div class="openingstijden"><p>Woensdag</p>
                        <p>Donderdag</p>
                        <p>Vrijdag</p>
                        <p>Zaterdag</p>
                        <p>Zondag</p></div>
                    <div class="openingstijden"><p>11:00-23:00</p>
                        <p>11:00-23:00</p>
                        <p>11:00-23:00</p>
                        <p>11:00-23:00</p>
                        <p>12:00-22:00</p></div>
                </div>
            </div>
        </div>
        <div class="detailsFooter"><img class="broersLogo" src="Images/BroersLogo.png" alt="logo">
            <p>Eetcafé BROERS</p>
            <p>Koningsplein 44</p>
            <p>2981 EA Ridderkerk</p>
            <p>info@broersridderkerk.nl</p>
            <p>06 - 48 18 54 03</p></div>
    </div>
</footer>
</body>
<style>
    .textArea {
        border: antiquewhite solid 1px;
        border-radius: 5px;
        max-width: 656.73px;
        background-color: #1C1512;
        resize: none;
    }


</style>

</html>
