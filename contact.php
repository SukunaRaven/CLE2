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
    <section class="hero is-height">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-1 shadow has-text-link">Contact</h1>
            </div>
        </div>
    </section>
</header>

<main class="has-background-info pt-0">
    <section class="section">
        <div class="container content is-flex is-flex-row contactRow">


            <div class="m-0 p-0" >
                <p class="m-0 p-0 pr-4" style="color: #DF5F2C"> Heb je een vraag? Stuur ons dan een bericht of bel ons! </p>
                <br>
                <div class="pb-2">
                <p class="m-0 p-0 pr-4" >Eetcafé BROERS</p>
                <p class="m-0 p-0 pr-4">Koningsplein 44</p>
                <p class="m-0 p-0 pr-4" > 2981 EA Ridderkerk</p>
                <p class="m-0 p-0 pr-4"  > info@broersridderkerk.nl</p>
                <p class="m-0 p-0 pr-4" >06 - 48 18 54 03</p>
                </div>
            </div>

            <div >
                <form class="column is-fullwidth container" action="" method="post">
                    <!-- name -->
                    <div>
                        <label class="label" for="name">Voornaam</label>

                        <div>
                            <input class="input is-link is-half-width" placeholder="Sire" id="name" type="text"
                                   name="name"
                                   value="<?= $name ?? '' ?>"/>

                            <p class="help is-danger">
                                <?= $errors['name'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                    <!-- surname -->

                    <label class="label" for="surname">Achternaam</label>

                    <input class="input is-link" placeholder="Wooferson" id="surname" type="text" name="surname"/>

                    <p class="help is-danger">
                        <?= $errors['surname'] ?? '' ?>
                    </p>

                    <!--email -->

                    <label class="label" for="email">E-mail</label>

                    <input class="input is-link" placeholder="SireWoofers@gmail.com" id="email" type="text" name="email"
                           value="<?= $email ?? '' ?>"/>

                    <p class="help is-danger">
                        <?= $errors['email'] ?? '' ?>
                    </p>


                    <!-- phonenumber -->

                    <label class="label" for="phoneNumber">Telefoonnummer</label>


                    <input class="input is-link" placeholder="06xxxxxxxx" id="phoneNumber" type="text"
                           name="phoneNumber"
                           value="<?= $phonenumber ?? '' ?>"/>

                    <p class="help is-danger">
                        <?= $errors['phoneNumber'] ?? '' ?>
                    </p>


                    <label class="label" for="textArea">Inhoud</label>
                    <textarea cols="100" rows="6" class="textArea" placeholder="Stel uw vraag hier" id="textArea" name="textarea"></textarea>
                    <!-- Submit -->
<div class="pb-4">

</div>
                    <button class="button is-warning is-outlined is-fullwidth" type="submit" name="submit">Verzenden
                    </button>


                </form>

            </div>
    </section>
</main>
<style>

    .privacyCheckBox {
        display: flex;
        flex-direction: row;
        gap: 20px;
        padding-bottom: 18px;
    }

    .linkPrivacy {
        color: #DF5F2C;
    }

    .privacyText {
        padding: 0;
        font-size: smaller;
    }

    .privacyText& Link {
        display: flex;
        align-content: center;
    }

    .checkbox {
        display: flex;
        transform: scale(1);
        align-content: center;

    }

    .textArea {
        resize: none;
        display: inline-block;
        max-width: 488.66px;
        overflow: hidden;
        border-radius: 5px ;
    }

    .contactRow {
        display: flex;
        justify-content: center;

    }

</style>


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
