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
        <?php if (empty($_SESSION)) : ?>
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
                <h1 class="title is-1 shadow has-text-link">Ons Aanbod</h1>
            </div>
        </div>
    </section>
</header>

<main class="has-background-info">

    <section class="container">
        <h2 class="has-text-centered is-size-3 has-text-link padding3">
            Wat kunt u nu allemaal daadwerkelijk bij ons boeken?
        </h2>
        <p class="has-text-centered">
            Bij BROERS verwelkomen we graag groepen van verschillende groottes.
            Of je nu een verjaardagsfeest, bedrijfsbijeenkomst, familiediner of een ander soort evenement plant, wij
            bieden de perfecte setting en service voor jouw gelegenheid.
            Onze groepsmenu's zijn speciaal samengesteld om aan de verschillende smaken en voorkeuren van jouw
            gezelschap te voldoen.
            Wij kunnen ook op maat gemaakte menu's aanbieden en rekening houden met dieetwensen en allergieën.
            Neem contact met ons op voor meer informatie over onze groepsarrangementen en om je reservering te maken.
            We helpen je graag om je evenement tot een succes te maken!
        </p>
        <div class="column">
            <article class="card content">
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
                <ul>
                    <li>Prachtige locatie: Een sfeervolle en romantische omgeving. Wij hebben de ruimte die bij
                        jullie visie past.
                    </li>
                    <li>Op maat gemaakte menu’s: Van een elegant diner tot een uitgebreid buffet of een informele
                        borrel, we stellen samen met jullie het perfecte menu samen, rekening houdend met
                        dieetwensen en voorkeuren.
                    </li>
                    <li>Catering voor grote en kleine groepen: Of je nu een klein en intiem huwelijk plant of een
                        groot feest met veel gasten, wij kunnen groepen van vele omvang verzorgen.
                    </li>
                    <li>Professionele service: Ons team zorgt voor een vlekkeloze uitvoering van jullie bruiloft,
                        van de ontvangst van de gasten tot het afscheid.
                    </li>
                </ul>
            </article>
        </div>

        <div class="column">
            <article class="card content">
                <h3 class="has-text-centered is-size-3 has-text-link">
                    <i class="fa fa-briefcase" style="font-size:24px">
                        Zakelijk
                    </i>
                </h3>
                <h4 class="has-text-centered is-size-5 has-text-weight-bold">
                    De Perfecte Locatie voor Jouw Zakelijke Evenementen.
                </h4>
                <p>
                    Of je nu een zakelijke lunch, een diner, een vergadering of een bedrijfsfeest organiseert, bij
                    BROERS bieden we de ideale omgeving voor professionele bijeenkomsten.
                    Wij begrijpen de behoeften van bedrijven en zorgen ervoor dat elk zakelijk evenement met zorg,
                    professionaliteit en stijl wordt uitgevoerd.
                </p>
                <p>
                    Onze zakelijke diensten:
                </p>
                <ul>
                    <li>Vergaderingen en Presentaties: Mogelijkheid tot prive ruimte. Ruimte is flexibel in te richten
                        voor zowel kleine teams als grotere groepen.
                    </li>
                    <li>Zakelijke lunches en diners: Organiseer een lunch of diner voor klanten, collega's of
                        zakenpartners.
                        Wij bieden een op maat samengesteld menu met zakelijke lunchopties of een dinerarrangement dat
                        aansluit bij de gelegenheid.
                    </li>
                    <li>Catering voor bedrijven: Wij bieden flexibele cateringdiensten voor externe evenementen,
                        vergaderingen of bedrijfsborrels.
                        Van finger food en borrelhapjes tot een volledig buffet of geserveerde maaltijd, we zorgen voor
                        een smaakvolle ervaring.
                    </li>
                    <li>Netwerkevenementen: Organiseer een netwerkborrel of een klantenevenement in een professionele,
                        ontspannen sfeer.
                        Onze experts helpen je bij het creëren van de juiste ambiance, met drankenarrangementen, hapjes
                        en andere faciliteiten.
                    </li>
                    <li>Bedrijfsevenementen en teambuilding: Organiseer een bedrijfsfeest, jubileum of
                        teambuilding-activiteit.
                        Of het nu gaat om een feestelijk diner, een informele borrel of een uitgebreide
                        bedrijfsbijeenkomst, wij zorgen voor de juiste setting en uitstekende service.
                    </li>
                </ul>
            </article>
        </div>

        <div class="column">
            <article class="card content">
                <h3 class="has-text-centered is-size-3 has-text-link">
                    <i class="fa fa-coffee" style="font-size:24px">
                        High Tea
                    </i>
                </h3>
                <h4 class="has-text-centered is-size-5 has-text-weight-bold">
                    Geniet van een Luxe High Tea in Sfeervolle Omgeving.
                </h4>
                <p>
                    Bij BROERS bieden we een heerlijke High Tea ervaring, perfect voor een ontspannen middag met
                    vrienden, familie of collega’s.
                    Laat je verwennen met een assortiment van verse theesoorten, delicate sandwiches, huisgemaakte
                    scones, zoete lekkernijen en andere smakelijke hapjes.
                    Alles wordt zorgvuldig samengesteld om een authentieke high tea-ervaring te bieden.
                </p>
                <p>
                    Wat kun je verwachten bij onze High Tea:
                </p>
                <ul>
                    <li>Een uitgebreide selectie thee:
                        Kies uit diverse theesoorten, van klassieke Engelse ontbijt- en Earl Grey-thee tot verfijnde
                        groene en kruideninfusies.
                    </li>
                    <li>Verse sandwiches:
                        Geniet van verfijnde sandwiches met diverse vullingen, zoals gerookte zalm, komkommer en
                        roomkaas, en luxe vleeswaren.
                    </li>
                    <li>Heerlijke scones:
                        Onze huisgemaakte scones worden geserveerd met clotted cream en fruitige jam, voor de ultieme
                        smaakbeleving.
                    </li>
                    <li>Zoete lekkernijen:
                        Diverse zoete hapjes zoals taartjes, macarons, petit fours en brownies.
                    </li>
                    <li>Speciale dieetwensen:
                        We bieden ook high tea-arrangementen voor vegetariërs, veganisten, of gasten met gluten- of
                        lactose-intolerantie.
                        Geef ons gewoon je voorkeuren door bij de reservering.
                    </li>
                </ul>
            </article>
        </div>

        <div class="column">
            <article class="card content">
                <h3 class="has-text-centered is-size-3 has-text-link">
                    <i class="fa fa-diamond" style="font-size:24px">
                        Jubileum
                    </i>
                </h3>
                <h4 class="has-text-centered is-size-5 has-text-weight-bold">
                    Bij BROERS begrijpen we hoe bijzonder het is om een jubileum te vieren.
                </h4>
                <p>
                    Of het nu gaat om een huwelijksjubileum, een bedrijfsjubileum of een andere belangrijke
                    mijlpaal,
                    wij bieden de perfecte locatie en service om deze speciale dag te markeren.
                    Laat ons jullie helpen een feest te organiseren dat past bij de betekenis van het moment.
                </p>
            </article>
        </div>

        <div class="column">
            <article class="card content">
                <h3 class="has-text-centered is-size-3 has-text-link">
                    <i class="fa fa-birthday-cake" style="font-size:24px">
                        Verjaardag
                    </i>
                </h3>
                <h4 class="has-text-centered is-size-5 has-text-weight-bold">
                    Een Feestelijke Ervaring voor Jouw Speciale Dag!
                </h4>
                <p>
                    Bij BROERS maken we van jouw verjaardagsviering een bijzonder moment.
                    Of je nu kiest voor een intiem diner met familie en vrienden of een groot feest, wij zorgen voor
                    een unieke en feestelijke ervaring.
                    Geniet van heerlijke gerechten, uitstekende service en een sfeervolle ambiance die jouw
                    verjaardag onvergetelijk maakt.
                </p>
                <p>
                    Laat je verwennen met een op maat samengesteld menu, afgestemd op jouw voorkeuren.
                    Van een feestelijk à la carte diner tot een uitgebreid buffet of shared dining voor een
                    gezellige, informele sfeer.
                </p>
            </article>
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

