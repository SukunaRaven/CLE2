<?php
session_start();
if (isset($_POST['submit'])) {
    /** @var mysqli $db */
    require_once "connection/connection.php";

    // Get form data
    $email = $_POST['email'];
    $phonenumber = $_POST['phoneNumber'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Server-side validation

    $errors = [];
    if ($name === '') {
        $errors['name'] = 'Voornaam mag niet leeg zijn';
    }

    if ($phonenumber === '') {
        $errors['phoneNumber'] = 'Telefoonnummer mag niet leeg zijn';
    }

    if ($email === '') {
        $errors['email'] = 'E-mail mag niet leeg zijn';
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'E-mail is niet geldig';
        } else {
            $query = "SELECT * FROM users WHERE email = '$email'";

            $result = mysqli_query($db, $query)
            or die('Error ' . mysqli_error($db) . ' with query ' . $query);

            if (mysqli_fetch_assoc($result)) {
                $errors['email'] = 'Deze gebruiker bestaat al';
            }
        }
    }

    if ($password === '') {
        $errors['password'] = 'Wachtwoord mag niet leeg zijn';
    } else {
        if (strlen($password) < 8) {
            $errors['password'] = 'Wachtwoord moet minimaal 8 tekens lang zijn';
        }
    }

    if (empty($errors)) {

        // create a secure password, with the PHP function password_hash()
        $securePassword = password_hash($password, PASSWORD_DEFAULT);

        // store the new user in the database.
        $query = "INSERT INTO `users`(`email`,`phonenumber`, `name`, `password`) VALUES 
                 ('$email','$phonenumber','$name','$securePassword')";

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
    <title>Broers Smaakmakers</title>
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"
    >
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <h1 class="title is-1 shadow has-text-link">Registreren</h1>
            </div>
        </div>
    </section>
</header>

<main class="has-background-info pt-0">
    <section class="section">
        <div class="container content">

            <form class="column is-6 container" action="" method="post">

                <p style="color: #DF5F2C"> Vul dit formulier in om een account aan te maken</p>
                <!-- name -->
                <div>
                    <label class="label" for="name">Voornaam</label>

                    <div>
                        <input class="input is-link" placeholder="Voornaam" id="name" type="text" name="name"
                               value="<?= $name ?? '' ?>"/>

                        <p class="help is-danger">
                            <?= $errors['name'] ?? '' ?>
                        </p>
                    </div>
                </div>

                <!--email -->

                <label class="label" for="email">E-mail</label>

                <input class="input is-link" placeholder="Email" id="email" type="text" name="email"
                       value="<?= $email ?? '' ?>"/>

                <p class="help is-danger">
                    <?= $errors['email'] ?? '' ?>
                </p>


                <!-- phonenumber -->

                <label class="label" for="phoneNumber">Telefoonnummer</label>


                <input class="input is-link" placeholder="Telefoonnummer" id="phoneNumber" type="text"
                       name="phoneNumber"
                       value="<?= $phonenumber ?? '' ?>"/>

                <p class="help is-danger">
                    <?= $errors['phoneNumber'] ?? '' ?>
                </p>


                <!-- Password -->

                <label class="label" for="password">Wachtwoord</label>

                <input class="input is-link" placeholder="Wachtwoord" id="password" type="password" name="password"/>

                <p class="help is-danger">
                    <?= $errors['password'] ?? '' ?>
                </p>

                <!-- Repeat password -->

                <label class="label" for="repeat-password">Wachtwoord herhalen</label>

                <input class="input is-link" placeholder="Wachtwoord" id="repeat-password" type="password"
                       name="repeat-password"/>

                <p class="help is-danger">
                    <?= $errors['repeat-password'] ?? '' ?>
                </p>
                <div class="privacyCheckBox">
                    <input class="checkbox" type="checkbox"/>
                    <div class="privacyText&Link">
                        <p class="privacyText">Bij het aanmaken van een account geef je
                            toestemming voor de <a class="linkPrivacy" href="#">Algemene Voorwaarden en
                                Privacyverklaring</a></p>
                    </div>
                    <p class="help is-danger">
                        <?= $errors['privacy-verklaring'] ?? '' ?>
                    </p>
                </div>
                <!-- Submit -->

                <button class="button is-link is-outlined is-fullwidth" type="submit" name="submit">Registreren
                </button>
                <div class="pt-3">
                    <p class="is-flex is-justify-content-center"> Heb je al een account? <a class="pl-2 linkPrivacy"
                                                                                            href="login.php"> Log in</a>
                    </p>
                </div>
            </form>

        </div>
    </section>
</main>
<style>

    .privacyCheckBox {
        display: flex;
        flex-direction: row;
        gap: 20px;
        padding-bottom: 18px;
    }

    .linkPrivacy {
        color: #DF5F2C;
    }

    .privacyText {
        padding: 0;
        font-size: smaller;
    }

    .privacyText& Link {
        display: flex;
        align-content: center;
    }

    .checkbox {
        display: flex;
        transform: scale(1);
        align-content: center;

    }


</style>

</body>


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
</html>
