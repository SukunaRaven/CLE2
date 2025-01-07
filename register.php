<?php
if (isset($_POST['submit'])) {
    /** @var mysqli $db */
    require_once "connection/connection.php";

    // Get form data
    $email = $_POST['email'];
    $phonenumber = $_POST['phoneNumber'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $surname = $_POST ['surname'];

    // Server-side validation

    $errors = [];
    if ($name === '') {
        $errors['name'] = 'Voornaam mag leeg zijn';
    }

    if ($phonenumber === '') {
        $errors['phoneNumber'] = 'Telefoonnummer mag niet leeg zijn';
    }

    if ($surname === '') {
        $errors['surname'] = 'Achternaam mag niet leeg zijn';
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
        $query = "INSERT INTO `users`(`email`,`phonenumber`, `name`, `password`, `surname`) VALUES ('$email','$phonenumber','$name','$securePassword','$surname')";

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
</head>

<body>
<nav class="navbar has-background-info" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item">
            <figure class="image is-32x32">
                <a href="homepage.php" target="_self"><img class="is-rounded" src="Images/BroersLogo.png" alt="Logo" /></a>
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
        <h2 class="title">Registreer</h2>

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
                        <label class="label" for="phoneNumber">Telefoonnummer</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control has-icons-left">
                                <input class="input" id="phoneNumber" type="text" name="phoneNumber"
                                       value="<?= $phonenumber ?? '' ?>"/>
                                <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                            </div>
                            <p class="help is-danger">
                                <?= $errors['phoneNumber'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- name -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="email">Voornaam</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control has-icons-left">
                                <label for="name"></label><input class="input" id="name" type="text" name="name" value="<?= $name ?? '' ?>"/>
                                <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                            </div>
                            <p class="help is-danger">
                                <?= $errors['name'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- surname -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="password">Achternaam</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control has-icons-left">
                                <label for="surname"></label><input class="input" id="surname" type="text" name="surname"/>
                                <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                            </div>
                            <p class="help is-danger">
                                <?= $errors['surname'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Password -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="password">Wachtwoord</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control has-icons-left">
                                <input class="input" id="password" type="password" name="password"/>
                                <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                            </div>
                            <p class="help is-danger">
                                <?= $errors['password'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="field is-horizontal">
                    <div class="field-label is-normal"></div>
                    <div class="field-body">
                        <button class="button is-link is-fullwidth" type="submit" name="submit">Register</button>
                    </div>
                </div>

            </form>
        </section>

    </div>
</section>

</body>
</html>
