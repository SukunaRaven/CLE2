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
        if (is_string($guests) < 8) {
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
    <link href="https://fonts.cdnfonts.com/css/imagination-station" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/open-sans" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
    <title>Broers Smaakmakers</title>
</head>

<body>

<?php include "./Nav/nav.php" ?>

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
            <form class="column is-full is-half-mobile inputField" action="" method="post">
                <div class="pt-5"></div>
                <!--email -->
                <label class="label" for="email">E-mail</label>
                <input class="input is-link is-three-quarters-mobile" id="email" type="text" name="email"
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
                <div class="wrapper">
                    <label for="datepicker">Pick a Date
                        <input type="text" id="datepicker" autocomplete="off">
                    </label>
                </div>

                <p class="help is-danger">
                    <?= $errors['date'] ?? '' ?>
                </p>

                <!-- time -->
                <style>

                    .time-picker-button {
                        background-color: #8C3A18;
                        color: #1C1512;
                        max-width: 656px;
                        max-height: 166px;
                        cursor: pointer;
                    }

                    .special {
                        background-color: #151515;
                        color: #8C3A18;
                    }


                </style>
                <label class="label" for="time">Tijdstip</label>

                <!-- custom time picker -->


                <div class="stack">
                    <label for="times-lunch">Tijden:*</label>
                    <select id="times-lunch" name="times" required>
                        <option value="" disabled selected>Tijdstip</option>
                        <option value="lunch">11:00</option>
                        <option value="lunch">11:15</option>
                        <option value="lunch">11:30</option>
                        <option value="lunch">11:45</option>
                        <option value="lunch">12:00</option>
                        <option value="lunch">12:15</option>
                        <option value="lunch">12:30</option>
                        <option value="lunch">12:45</option>
                        <option value="lunch">13:00</option>
                        <option value="lunch">13:15</option>
                        <option value="lunch">13:30</option>
                        <option value="lunch">13:45</option>
                        <option value="lunch">14:00</option>
                        <option value="lunch">14:15</option>
                        <option value="lunch">14:30</option>
                        <option value="lunch">14:45</option>
                        <option value="lunch">15:00</option>
                        <option value="lunch">15:15</option>
                        <option value="lunch">15:30</option>
                        <option value="lunch">15:45</option>
                        <option value="diner">16:00</option>
                        <option value="diner">16:15</option>
                        <option value="diner">16:30</option>
                        <option value="diner">16:45</option>
                        <option value="diner">17:00</option>
                        <option value="diner">17:15</option>
                        <option value="diner">17:30</option>
                        <option value="diner">17:45</option>
                        <option value="diner">18:00</option>
                        <option value="diner">18:15</option>
                        <option value="diner">18:30</option>
                        <option value="diner">18:45</option>
                        <option value="diner">19:00</option>
                        <option value="diner">19:15</option>
                        <option value="diner">19:30</option>
                        <option value="diner">19:45</option>
                        <option value="diner">20:00</option>
                    </select>
                </div>
                <input class="input is-link" id="time" type="time" name="time"/>

                <p class="help is-danger">
                    <?= $errors['time'] ?? '' ?>
                </p>

                <!-- Extra informatie -->

                <label class="label" for="comments">Extra informatie</label>

                <textarea class="is-link textarea" cols="89" rows="6" name="comments"></textarea>

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
</section>

<style>
    .textArea {
        border: #1C1512 solid 1px;
        border-radius: 5px;
        max-width: 656.73px;
        background-color: antiquewhite;
        resize: none;
    }

    @media (max-width: 767px) {
        .footerRow {
            padding: 20px 20px;
            flex-direction: column;
            justify-content: center;

        }

        .logoRows {
            display: flex;
            flex-direction: row;
            gap: 10px;
        }

        .socialmediaFormat {
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .inputField {
            display: flex;
            flex-direction: column;
            max-width: 150vw;

        }

        .columns {
            display: flex;
            align-content: center;
            justify-content: center;
        }


    }
</style>

<footer class="has-background-info">
    <div class="footerRow">
        <div class="socialmediaFormat"><p>Follow Us!</p>
            <div class="logoRows">
                <a href="https://www.instagram.com/broers.ridderkerk">
                    <i class="fa fa-instagram" style="font-size:30px"></i>
                </a>

                <a href="https://www.facebook.com/profile.php?id=61562490741128">
                    <i class="fa fa-facebook-square" style="font-size:30px"></i>
                </a>
            </div>
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
