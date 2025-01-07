<?php ?>

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
<nav class="navbar has-background-black" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item">
            <figure class="image is-32x32">
                <a href="homepage.php" target="_blank"></a> <img class="is-rounded" src="https://bulma.io/assets/images/placeholders/128x128.png" />
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
            <a href="aanbod.php" class="navbar-item">
                Ons Aanbod
            </a>

            <a href="menu.php" class="navbar-item ">
                Ons Menu
            </a>

            <a href="reserveringen.php" class="navbar-item">
                Reserveer
            </a>

            <a href="contact.php" class="navbar-item">
                Contact
            </a>

            <a href="reviewspage.php" class="navbar-item">
                Onze Reviews
            </a>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a href="register.php" class="button is-link is-outlined"">
                            <strong>Registreren</strong>
                        </a>

                        <a href="login.php" class="button is-link is-outlined"">
                            Log In
                        </a>

                        <a href="logout.php" class="button is-primary is-outlined"">
                            Log Uit
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
</nav>

</body>
</html>
