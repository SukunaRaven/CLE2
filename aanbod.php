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
                <a href="homepage.php"><img class="is-rounded" src="Images/BroersLogo.png" alt="Logo" /></a>
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

<main>

    <section class="container">
        <h2 class="has-text-centered is-size-3 has-text-link padding3">
            Wat kunt u nu allemaal daadwerkelijk bij ons boeken?
        </h2>
        <div class="columns is-justify-content-space-evenly">
            <div class="column">
                <article class="card">
                    <h3 class="has-text-centered is-size-3 has-text-link">
                        <i class="fa fa-heart-o" style="font-size:24px">
                            Trouwen
                        </i>
                    </h3>
                    <h4 class="has-text-centered is-size-5 has-text-weight-bold">
                        Jullie Grote Dag, Onze Perfecte Locatie!
                    </h4>
                    <p>
                        Wat wij bieden:
                    </p>
                    <p>
                        Prachtige locatie: Een sfeervolle en romantische omgeving. Wij hebben de ruimte die bij jullie visie past.
                        Op maat gemaakte menu’s: Van een elegant diner tot een uitgebreid buffet of een informele borrel, we stellen samen met jullie het perfecte menu samen, rekening houdend met dieetwensen en voorkeuren.
                        Catering voor grote en kleine groepen: Of je nu een klein en intiem huwelijk plant of een groot feest met veel gasten, wij kunnen groepen van vele omvang verzorgen.
                        Professionele service: Ons team zorgt voor een vlekkeloze uitvoering van jullie bruiloft, van de ontvangst van de gasten tot het afscheid.
                    </p>
                </article>
            </div>

            <div class="column">
                <article class="card">
                    <h3 class="has-text-centered is-size-3 has-text-link">
                        <i class="fa fa-diamond" style="font-size:24px">
                            Jubileum
                        </i>
                    </h3>
                    <h4 class="has-text-centered is-size-5 has-text-weight-bold">
                        Bij BROERS begrijpen we hoe bijzonder het is om een jubileum te vieren.
                    </h4>
                    <p>
                        Of het nu gaat om een huwelijksjubileum, een bedrijfsjubileum of een andere belangrijke mijlpaal,
                        wij bieden de perfecte locatie en service om deze speciale dag te markeren.
                        Laat ons jullie helpen een feest te organiseren dat past bij de betekenis van het moment.
                    </p>
                </article>
            </div>

            <div class="column">
                <article class="card">
                    <h3 class="has-text-centered is-size-3 has-text-link">
                        <i class="fa fa-birthday-cake" style="font-size:24px">
                            Verjaardag
                        </i>
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

