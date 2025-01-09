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

            <a href="evenementen.php" class="navbar-item is-link">
                Onze Evenementen
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

<main class="has-background-info">

    <section class="container">
        <h2 class="title is-3 has-text-centered has-text-link has-text-weight-bold">Menu</h2>
        <div class="columns">

            <div class="column">
                <article>
                    <div class="has-text-centered">
                        <img class="image is-3by4" src="Images/LunchFoto.jpg" alt="Lunch"/>
                        <h3 class="has-button-centered button is-link is-outlined is-fullwidth">
                            <a href="lunchenborrel.php">
                                Lunch en Borrel
                            </a>
                        </h3>
                    </div>
                </article>
            </div>

            <div class="column">
                <article>
                    <div class="has-text-centered">
                        <img class="image is-3by4" src="Images/vork.jpg" alt="Diner"/>
                        <h3 class="has-button-centered button is-link is-outlined is-fullwidth">
                            <a href="diner.php">
                                Diner
                            </a>
                        </h3>
                    </div>
                </article>
            </div>

            <div class="column">
                <article>
                    <div class="has-text-centered">
                        <img class="image is-3by4" src="Images/BorrelFoto.jpg" alt="Drank"/>
                        <h3 class="has-button-centered button is-link is-outlined is-fullwidth">
                            <a href="drank.php">Drank</a>
                        </h3>
                    </div>
                </article>
            </div>

            <div class="column">
                <article>
                    <div class="has-text-centered">
                        <img class="image is-3by4" src="Images/Cocktails.jpg" alt="Borrel"/>
                        <h3 class="has-button-centered button is-link is-outlined is-fullwidth">
                            <a href="cocktails.php">Cocktails</a>
                        </h3>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="has-background-warning">
        <h2 class="title is-3 has-text-centered has-text-link has-text-weight-bold">Over Ons</h2>
        <p class="has-text-centered has-text-link">
            Lorem
        </p>
    </section>
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
</html>
