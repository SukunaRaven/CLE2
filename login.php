<?php
/** @var mysqli $db */
require_once 'connection/connection.php';


session_start();

$login = false;
// Is user logged in?

if (isset($_POST['submit'])) {

// Get form data

    $email = $_POST['email'];
    $password = $_POST['password'];

// Server-side validation
    $errors = [];
    if ($email == '') {
        $errors['email'] = 'Vul a.u.b email in';
    }
    if ($password == '') {
        $errors['password'] = 'Vul a.u.b wachtwoord in';
    }

// If data valid
    if (empty($errors)) {

        // SELECT the user from the database, based on the email address.
        $query = "SELECT * FROM users WHERE email= '$email'";
        //het resultaat van de query
        $result = mysqli_query($db, $query);

        //aantal toegevoegde logins
        $rows = mysqli_num_rows($result);

        //ALS er 1 login is toegevoegd
        if ($rows === 1) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['password'])) {
                echo "Login successful";
                $login = true;

                $_SESSION['loggedIn'] = true;
                $_SESSION['loggedInUser'] = [
                    'id' => $user ['id'],
                    'name' => $user ['name'],
                    'email' => $user ['email'],
                ];
                header('location: homepage.php');
                exit;
            } else {
                $errors['password'] = 'Wachtwoord is fout!';
            }

        } else {
            echo "Login failed";
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

<main>
    <section class="section">
        <div class="container content">
            <h2 class="title">Log in</h2>

            <?php if ($login) { ?>
                <p>Je bent al ingelogd!</p>
                <p><a href="logout.php">Uitloggen</a></p>
            <?php } ?>

                <section class="columns">
                    <form class="column is-6" action="" method="post">

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label" for="email">Email</label>
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

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label" for="password">Password</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control has-icons-left">
                                        <input class="input" id="password" type="password" name="password"/>
                                        <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>

                                        <?php if (isset($errors['loginFailed'])) { ?>
                                            <div class="notification is-danger">
                                                <button class="delete"></button>
                                                <?= $errors['loginFailed'] ?>
                                            </div>
                                        <?php } ?>

                                    </div>
                                    <p class="help is-danger">
                                        <?= $errors['password'] ?? '' ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal"></div>
                            <div class="field-body">
                                <button class="button is-link is-fullwidth" type="submit" name="submit">Log in With
                                    Email
                                </button>
                            </div>
                        </div>

                    </form>
                </section>


        </div>
    </section>
</main>

</body>
</html>
