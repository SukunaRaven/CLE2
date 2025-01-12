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

    <STYLE>
        .click-zoom input[type=checkbox] {
            display: none
        }

        .click-zoom img {
            transition: transform 0.25s ease;
            cursor: zoom-in
        }

        .click-zoom input[type=checkbox]:checked ~ img {
            /* how to modify this to use exact image width instead of scaling?*/
            transform: scale(1.5);
            cursor: zoom-out
        }
    </STYLE>
</head>

<body>

<?php include "./Nav/nav.php" ?>

<header class="background-image is-primary is-medium">
    <section class="hero">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-1 shadow has-text-link">Ons Menu</h1>
            </div>
        </div>
    </section>
</header>

<main class="has-background-info">

    <section>
        <div class="tabs is-centered">
            <ul>
                <li id="menu" class="is-active"><a>Ons menu</a></li>
                <li id="lunch"><a>Lunch & Borrel</a></li>
                <li id="diner"><a>Diner</a></li>
                <li id="drank"><a>Drank</a></li>
                <li id="cocktails"><a>Cocktails</a></li>
            </ul>
        </div>
    </section>

    <section id="menu-section" class="menu-on">
        <p class="has-text-centered is-size-3 has-text-link padding3">
            Voor Iedere Smaak Wat Wils
        </p>
        <p class="has-text-centered">
            Bij eetcafé BROERS kun je genieten van heerlijke gerechten, bereid met de beste ingrediënten en passie voor
            het vak.
            Of je nu komt voor een gezellige lunch of een sfeervol diner, wij zorgen voor een culinaire ervaring die je
            niet snel zult vergeten.
        </p>
        <div class="columns">
            <div class="column has-text-centered">
                <img class="is-centered" src="Images/menu.png" alt="Menu">
            </div>
        </div>
    </section>

    <section id="lunch-section" class="container menu-off">
        <p class="has-text-centered is-size-3 has-text-link padding3">
            Bekijk hier ons Lunch en Borrel menu!
        </p>
        <div class="columns">
            <div class="column has-text-centered">
                <div class='click-zoom'>
                    <label>
                        <input type='checkbox'/>
                        <img class="is-centered" src="Images/lunch1.png" alt="Lunch kaart">
                    </label>
                </div>
            </div>
            <div class="column has-text-centered">
                <div class='click-zoom'>
                    <label>
                        <input type='checkbox'/>
                        <img class="is-centered" src="Images/lunch2.png" alt="Lunch en Borrel kaart">
                    </label>
                </div>
            </div>
        </div>
    </section>

    <section id="diner-section" class="container menu-off">
        <p class="has-text-centered is-size-3 has-text-link padding3">
            Bekijk hier ons Diner menu!
        </p>
        <div class="columns">
            <div class="column has-text-centered">
                <div class='click-zoom'>
                    <label>
                        <input type='checkbox'/>
                        <img class="is-centered" src="Images/diner1.png" alt="Diner kaart">
                    </label>
                </div>
            </div>
            <div class="column has-text-centered">
                <div class='click-zoom'>
                    <label>
                        <input type='checkbox'/>
                        <img class="is-centered" src="Images/diner2.png" alt="Diner kaart 2">
                    </label>
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column has-text-centered">
                <div class='click-zoom'>
                    <label>
                        <input type='checkbox'/>
                        <img class="is-centered" src="Images/diner3.png" alt="Diner kaart 3">
                    </label>
                </div>
            </div>
            <div class="column has-text-centered">
                <div class='click-zoom'>
                    <label>
                        <input type='checkbox'/>
                        <img class="is-centered" src="Images/diner4.png" alt="Diner kaart 4">
                    </label>
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column has-text-centered">
                <div class='click-zoom'>
                    <label>
                        <input type='checkbox'/>
                        <img class="is-centered" src="Images/diner5.png" alt="Diner kaart 5">
                    </label>
                </div>
            </div>
        </div>
    </section>

    <section id="drank-section" class="container menu-off">
        <p class="has-text-centered is-size-3 has-text-link padding3">
            Bekijk hier onze Dranken!
        </p>
        <div class="columns">
            <div class="column has-text-centered">
                <div class='click-zoom'>
                    <label>
                        <input type='checkbox'/>
                        <img class="is-centered" src="Images/drank1.png" alt="Dranken kaart">
                    </label>
                </div>
            </div>
            <div class="column has-text-centered">
                <div class='click-zoom'>
                    <label>
                        <input type='checkbox'/>
                        <img class="is-centered" src="Images/drank2.png" alt="Dranken kaart 2">
                    </label>
                </div>
            </div>
        </div>
    </section>

    <section id="cocktails-section" class="container menu-off">
        <p class="has-text-centered is-size-3 has-text-link padding3">
            Bekijk hier onze Cocktails!
        </p>
        <div class="column has-text-centered">
            <div class='click-zoom'>
                <label>
                    <input type='checkbox'/>
                    <img class="is-centered" src="Images/CocktailsKaart.jpg" alt="Cocktail kaart">
                </label>
            </div>
        </div>
    </section>

</main>

<footer class="has-background-info">
    <div class="footerRow">
        <div><p>Follow Us!</p>
            <a target="_blank" href="https://www.instagram.com/broers.ridderkerk">
                <i class="fa fa-instagram" style="font-size:30px"></i>
            </a>

            <a target="_blank" href="https://www.facebook.com/profile.php?id=61562490741128">
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

<script src="js/menu.js"></script>

</body>
</html>
