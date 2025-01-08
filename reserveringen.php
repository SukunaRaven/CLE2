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
    <section class="hero is-halfheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-1 shadow has-text-link">Eetcafé Broers</h1>
            </div>
        </div>
    </section>
</header>

<section class="section">
    <div class="container content">
        <h2 class="title">Reserveren</h2>

        <section class="columns">
            <form class="column is-6" action="" method="post">

                <!--email -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="email">E-mail</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control has-icons-left">
                                <input class="input" id="email" type="text" name="email"
                                       value="<?= $email ?? '' ?>"/>
                                <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                            </div>
                            <p class="help is-danger">
                                <?= $errors['email'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- phonenumber -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="phonenumber">Telefoonnummer</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control has-icons-left">
                                <input class="input" id="phonenumber" type="text" name="phonenumber"
                                       value="<?= $phonenumber ?? '' ?>"/>
                                <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                            </div>
                            <p class="help is-danger">
                                <?= $errors['phonenumber'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- name -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="name">Naam</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control has-icons-left">
                                <label for="name"></label><input class="input" id="name" type="text" name="name"
                                                                 value="<?= $name ?? '' ?>"/>
                                <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                            </div>
                            <p class="help is-danger">
                                <?= $errors['name'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Guests -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="guests">Gasten</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control has-icons-left">
                                <input class="input" id="guests" type="text" name="guests"/>
                                <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                            </div>
                            <p class="help is-danger">
                                <?= $errors['guests'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Date -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="date">Datum</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control has-icons-left">
                                <input class="input" id="date" type="date" name="date"/>
                                <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                            </div>
                            <p class="help is-danger">
                                <?= $errors['date'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- time -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="time">Tijdstip</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control has-icons-left">
                                <input class="input" id="time" type="time" name="time"/>
                                <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                            </div>
                            <p class="help is-danger">
                                <?= $errors['time'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- comments -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="comments">Commentaar</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control has-icons-left">
                                <input class="input" id="comments" type="text" name="comments"/>
                                <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                            </div>
                            <p class="help is-danger">
                                <?= $errors['comments'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>


                <!-- Submit -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal"></div>
                    <div class="field-body">
                        <button class="button is-primary is-fullwidth" type="submit" name="submit">Reserveer</button>
                    </div>
                </div>

            </form>
        </section>

    </div>
</section>

<footer class="has-background-info">
    <div class="footerRow">
        <div><p>Follow Us!</p>
            <a href="https://www.instagram.com/broers.ridderkerk">
                <i class="fa fa-instagram" style="font-size:24px"></i>
            </a>
            <a href="https://www.tiktok.com/@broers.ridderkerk">
                <i class="fa-brands fa-tiktok" style="font-size:24px"></i>
            </a>
            <a href="https://www.facebook.com/profile.php?id=61562490741128">
                <i class="fa fa-facebook-square" style="font-size:24px"></i>
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
