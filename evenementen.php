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
    <section class="hero">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-1 shadow has-text-link">Evenementen</h1>
            </div>
        </div>
    </section>
</header>

<main class="has-background-info">

    <section class="container">
        <h2 class="has-text-centered is-size-3 has-text-link">
            Onze Evenementen worden tijdig geüpdatet.
        </h2>
        <div class="columns">
            <div class="column">
                <h3 class="has-text-centered is-size-4 has-text-link">
                    Valentijnsdag
                </h3>
                <h4 class="has-text-centered">
                    Vier Valentijnsdag bij Broers!
                </h4>
                <p>
                    Op Valentijnsdag hebben wij iets heel bijzonders voor jou en je geliefde in petto!
                    Kom gezellig langs en geniet van een speciale Valentijns High-Tea met heerlijke zoete en hartige lekkernijen, perfect om samen te delen.
                    Of verras je Valentijn met ons exclusieve Valentijnsmenu, samengesteld met de fijnste ingrediënten voor een onvergetelijke culinaire ervaring.
                </p>
                <p>
                    High Tea: Proef een romantische selectie van finger sandwiches, scones met jam en clotted cream,
                    delicate gebakjes en andere verwennerijen – alles met een vleugje liefde.
                </p>
                <p>
                    Valentijnsmenu: Geniet van een 4-gangen menu met verfijnde smaken, speciaal voor deze dag.
                    Perfect om samen te delen en het moment te vieren.
                </p>
                <p>
                    Kom de liefde proeven en maak van deze dag een romantisch feest bij Eetcafé Broers!
                </p>
            </div>
            <div class="column">
                <h3 class="has-text-centered is-size-4 has-text-link">
                    Zondag Familiedag
                </h3>
                <h4 class="has-text-centered">
                    Voor groot en klein bij Broers!
                </h4>
            </div>
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

</main>

</body>
</html>
