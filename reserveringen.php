<?php
if (isset($_POST['submit'])) {
    /** @var mysqli $db */
    require_once "connection/connection.php";

// Get form data
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $guests = $_POST['guests'];
    $time = $_POST ['time'];
    $comments = $_POST ['comments'];

// Server-side validation

    $errors = [];

    if ($guests === '') {
        $errors['guests'] = 'Gasten mogen niet leeg zijn';
    } else {
        if (strlen($guests) < 8) {
            $errors['guests'] = 'Maximaal 8 gasten';
        }
    }

    if ($phonenumber === '') {
        $errors['phonenumber'] = 'Telefoonnummer mag niet leeg zijn';
    }

    if ($date === '') {
        $errors['date'] = 'Datum mag niet leeg zijn';
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
        $query = "INSERT INTO `reservations`(`email`,`phonenumber`, `name`, `guests`, `date`, `time`, `comments`) 
              VALUES ('$email','$phonenumber','$name','$guests','$date','$time','$comments')";

        $result = mysqli_query($db, $query)
        or exit('Error ' . mysqli_error($db) . ' with query ' . $query);

        mysqli_close($db);
        // If query succeeded
        if ($result) {

            // Redirect to login page
            header('location: login.php');
            // Exit the code
            exit;
        }
    }
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

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div class="navbar-menu">
        <div class="navbar-end">
            <a id="button" href="aanbod.php" class="navbar-item is-link">
                Ons Aanbod
            </a>

            <a href="menu.php" class="navbar-item is-link">
                Ons Menu
            </a>

            <a href="reserveringen.php" class="navbar-item is-link">
                Reserveer
            </a>

            <a href="contact.php" class="navbar-item is-link">
                Contact
            </a>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a href="register.php" class="button is-link is-outlined">
                            <strong>Registreren</strong>
                        </a>

                        <a href="login.php" class="button is-link is-outlined">
                            Log In
                        </a>

                        <a href="logout.php" class="button is-primary is-outlined">
                            Log Uit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</nav>

<header class="background-image is-primary is-medium">
    <section class="hero is-height">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-1 shadow has-text-link">Reserveren</h1>
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
                <!-- phonenumber -->

                <label class="label" for="phonenumber">Telefoonnummer</label>
                <input class="input is-link" id="phonenumber" type="text" name="phonenumber"
                       value="<?= $phonenumber ?? '' ?>"/>
                <p class="help is-danger">
                    <?= $errors['phonenumber'] ?? '' ?>
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
                <input class="input is-link" id="guests" type="text" name="guests"/>
                <p class="help is-danger">
                    <?= $errors['guests'] ?? '' ?>
                </p>

                <!-- Date -->
                <label class="label" for="date">Datum</label>
                <input class="input is-link" id="date" type="date" name="date"/>

                <p class="help is-danger">
                    <?= $errors['date'] ?? '' ?>
                </p>

                <!-- time -->

                <label class="label" for="time">Tijdstip</label>
                <input class="input is-link" id="time" type="time" name="time"/>

                <p class="help is-danger">
                    <?= $errors['time'] ?? '' ?>
                </p>

                <!-- Extra informatie -->

                <label class="label" for="comments">Extra informatie</label>

                <textarea class="is-normal textArea" cols="89" rows="6" name="extra-information"></textarea>

                <p class="help is-danger">
                    <?= $errors['extra-information'] ?? '' ?>
                </p>

                <!-- Submit -->

                        <button class="button is-link is-outlined is-fullwidth" type="submit" name="submit">Reserveren
                        </button>
                  

        </section>
    </div>


</main>
</section>

<style>
    .textArea {
        border: antiquewhite solid 1px;
        border-radius: 5px;
        max-width: 656.73px;
        background-color: #1C1512;
        resize: none;
    }

    .inputDesign {

    }
</style>

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
</html>
