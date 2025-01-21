<?php
session_start();
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
                <a href="homepage.php" target="_self"><img class="is-rounded" src="../Images/BroersLogo.png"
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
        <h2 class="has-text-centered is-size-3 has-text-link padding3">
            Onze Evenementen worden tijdig geüpdatet.
        </h2>
        <div class="columns is-justify-content-space-evenly">
            <div class="column">
                <article class="card">
                    <h3 class="has-text-centered is-size-3 has-text-link">
                        Valentijnsdag
                    </h3>
                    <h4 class="has-text-centered is-size-5 has-text-weight-bold">
                        Vier Valentijnsdag bij Broers!
                    </h4>
                    <p>
                        Op Valentijnsdag hebben wij iets heel bijzonders voor jou en je geliefde in petto!
                        Kom gezellig langs en geniet van een speciale Valentijns High-Tea met heerlijke zoete en hartige
                        lekkernijen, perfect om samen te delen.
                        Of verras je Valentijn met ons exclusieve Valentijnsmenu, samengesteld met de fijnste
                        ingrediënten voor een onvergetelijke culinaire ervaring.
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
                </article>
            </div>
            <div class="column">
                <article class="card">
                    <h3 class="has-text-centered is-size-3 has-text-link">
                        Zondag Familiedag
                    </h3>
                    <h4 class="has-text-centered is-size-5 has-text-weight-bold">
                        Voor groot en klein bij Broers!
                    </h4>
                    <p>
                        Bij Eetcafé Broers weten we hoe belangrijk quality time met de familie is.
                        Daarom zetten we elke zondagmiddag in het teken van gezelligheid voor het hele gezin!
                        Van 16.00 tot 18.00 eten de kleintjes t/m 6 jaar gratis mee terwijl de volwassenen genieten van
                        heerlijke gerechten die we met liefde uit de keuken toveren.
                    </p>
                    <p>
                        De perfecte gelegenheid om samen te genieten, te lachen en lekker te smullen zonder je druk te
                        maken
                        over het koken.
                        Wij zorgen voor het eten, jullie voor de gezelligheid!
                    </p>
                    <p>
                        Wanneer: Elke zondagmiddag van 16.00 – 18.00 uur
                    </p>
                    <p>
                        Waar: Eetcafé Broers
                    </p>
                    <p>
                        Reserveer snel je tafel en maak er een heerlijke middag van met je gezin!
                    </p>
                </article>
            </div>
        </div>
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
