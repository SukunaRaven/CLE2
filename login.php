<?php
require_once 'connection/connection.php';
session_start();
var_dump($_SESSION);
$login = false;
//am I even logged in? if not, send me to the loginpage

if (isset($_POST['submit'])) {
    /** @var mysqli $db */

// Get form data

    $email = $_POST['email'];
    $password = $_POST['password'];


// Server-side validation
    $errors = [];
    if ($email == '') {
        $errors['email'] = 'Vul a.u.b email in';
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Combinatie van gebruikersnaam en wachtwoord klopt niet';
        } else {
            $query = "SELECT * FROM users WHERE email = '$email'";

            $result = mysqli_query($db, $query)
            or die('Error ' . mysqli_error($db) . ' with query ' . $query);
        }

        if ($password == '') {
            $errors['password'] = 'Vul a.u.b wachtwoord in';
        }

// If data valid

        if (empty($errors)) {
            require_once "connection/connection.php";
            // SELECT the user from the database, based on the email address.

            $query = "SELECT * FROM users WHERE email = '$email'";

            $result = mysqli_query($db, $query)
            or die('Error ' . mysqli_error($db) . ' with query ' . $query);
        }


// check if the user exists
        if (mysqli_num_rows($result) == 1) {

            // Get user data from result
            $user = mysqli_fetch_assoc($result);

            // Check if the provided password matches the stored password in the database
            if (password_verify($password, $user['password'])) {

                session_start();

                // Store the user in the session
                $_SESSION['user'] = $email;
                $_SESSION['admin_flag'] = $user['admin_flag'];

                // Redirect to secure page

                if (isset($_SESSION['admin_flag']))  {
                        header('Location: admin.php');
                    } else {
                    header('location: homepage.php');
                }
                exit();
            } else {
                // Credentials not valid
                $errors['loginfailed'] = 'Username/password incorrect';
            }
            //error incorrect log in
        } else {
            $errors['loginfailed'] = 'Username/password incorrect';
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
                <a href="../homepage.php" target="_self"><img class="is-rounded" src="../Images/BroersLogo.png"
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
            <a href="../menu.php" class="navbar-item is-link">
                Ons Menu
            </a>

            <a href="../reserveringen.php" class="navbar-item is-link">
                Reserveer
            </a>

            <a href="../contact.php" class="navbar-item is-link">
                Contact
            </a>

            <a href="../users.php" class="navbar-item is-link">
                Users
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Meer
                </a>

                <div class="navbar-dropdown">
                    <a href="../aanbod.php" class="navbar-item">
                        Ons Aanbod
                    </a>
                    <a href="../evenementen.php" class="navbar-item">
                        Onze Evenementen
                    </a>
                    <a href="../arrangementen.php" class="navbar-item">
                        Onze Arrangementen
                    </a>
                    <a href="../reviewspage.php" class="navbar-item">
                        Reviews
                    </a>
                </div>
            </div>
        </div>
        <?php if (empty($_SESSION)) :?>
            <div class="buttons">
                <a href="../login.php" class="button is-primary is-outlined">
                    Log In
                </a>
            </div>
        <?php elseif (isset($_SESSION['admin_flag'])): ?>
            <?php if ($_SESSION['admin_flag'] == 1): ?>
                <div class="buttons">
                    <a href="../admin.php" class="button is-primary is-outlined">
                        Admin
                    </a>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="buttons">
                <a href="../logout.php" class="button is-link is-outlined">
                    Log Out
                </a>
            </div>
        <?php endif; ?>

    </div>

</nav>


<header class="background-image is-primary is-medium">
    <section class="hero">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-1 shadow has-text-link">Log in</h1>
            </div>
        </div>
    </section>
</header>

<main class="has-background-info">

    <section class="section">
        <div class="container content">

            <?php if ($login) { ?>
                <p>Je bent al ingelogd!</p>
                <p><a href="logout.php">Uitloggen</a></p>
            <?php } ?>

            <section class="columns is-centered">
                <form class="column is-6" action="" method="post">

                    <div class="field-label is-normal">
                        <label class="label has-text-centered" for="email">Email</label>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-link" id="email" type="text" name="email" placeholder="Email"
                                           value="<?= $email ?? '' ?>"/>
                                </div>
                                <p class="help is-danger">
                                    <?= $errors['email'] ?? '' ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="field-label is-normal">
                        <label class="label has-text-centered" for="password">Wachtwoord</label>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-link is" id="password" type="password" name="password"
                                           placeholder="Wachtwoord"/>
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

                    <p>
                        Nog geen account? <a class="has-text-primary" href="register.php">Registreer</a> hier!
                    </p>

                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <div class="field-body">
                                <button class="button is-link is-outlined" type="submit" name="submit">
                                    Log in
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </section>

        </div>
    </section>
</main>

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
