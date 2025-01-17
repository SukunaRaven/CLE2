<?php

//am I even logged in? if not, send me to the loginpage
if (!isset($_SESSION['loggedInUser'])) {
    header("Location: login.php");

    // Is user logged in?
}

if (isset($_SESSION['admin_flag']) ) {
    if ($_SESSION['admin_flag'] == 1) {
        header('Location: alle-reserveringen.php');
        exit;
    };
} else {
    header('Location: homepage.php');
    exit;
}

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

session_start();

//Get email from session
$name = $_SESSION['loggedInUser']['name'];


require_once "includes/functions.php";

//Get the current week from the GET or default to 0 (current week)
$selectedWeek = $_GET['week'] ?? 0;

//Retrieve the timestamp that belongs to the week that is active
$timestampWeek = strtotime("+$selectedWeek weeks");

//Get the weekdays that are part of the active week based on the timestamp
$weekDays = getWeekDays($timestampWeek);

//Get the month that belongs to the monday of that week
$monthOfWeek = date('F', $weekDays[0]['timestamp']);

//Get the year that belongs to the monday of that week
$yearOfWeek = date('Y', $weekDays[0]['timestamp']);

//The actual times visible in the calendar view
$rosterTimes = getRosterTimes();

//The events from the database that are in this week
$events = getEvents($weekDays[0]['fullDate'], $weekDays[6]['fullDate']);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AdminPagina</title>
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"
    >
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<?php include "./Nav/nav.php" ?>

<main>
    <div class="container">
        <div class="title">
            <a href="?week=<?= $selectedWeek - 1 ?>"> <i class="fa fa-angle-left"></i> Vorige week</a>
            <span><?= $monthOfWeek . ' ' . $yearOfWeek; ?></span>
            <a href="?week=<?= $selectedWeek + 1 ?>">  Volgende week <i class="fa fa-angle-right"></i></a>
        </div>
        <div class="days">
            <div class="filler"></div>
            <div class="filler"></div>
            <?php foreach ($weekDays as $weekday) { ?>
                <div class="day<?= $weekday['current'] ? ' current' : ''; ?>">
                    <?= $weekday['day'] . ' ' . $weekday['dayNumber']; ?>
                </div>
            <?php } ?>
        </div>
        <div class="content">
            <div class="filler-col"></div>
            <div class="col monday"></div>
            <div class="col tuesday"></div>
            <div class="col wednesday"></div>
            <div class="col thursday"></div>
            <div class="col friday"></div>
            <div class="col weekend saturday"></div>
            <div class="col weekend sunday"></div>
            <?php foreach ($rosterTimes as $index => $rosterTime) { ?>
                <div class="time row-roster-<?= $index + 1; ?>"><?= $rosterTime; ?></div>
                <div class="row row-roster-<?= $index + 1; ?>"></div>
            <?php } ?>
            <?php foreach ($events as $event) { ?>
                <a href="" class="event event-item-<?= $event['id']; ?>"><?= $event['description']; ?></a>
            <?php } ?>
        </div>
    </div>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            background: #151515;
        }

        .container {
            width: 100%;
            display: grid;
            grid-template-rows: 3em 3em auto;
        }

        .title {
            background: #8C3A18;
            text-align: center;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            place-content: center;
            color: antiquewhite;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .title a {
            color: antiquewhite;
            font-size: medium;
        }

        .title span {
            font-weight: bold;
            font-size: large;
        }

        .days {
            background: #151515;
            display: grid;
            place-content: center;
            text-align: center;
            grid-template-columns: 3em 10px repeat(7, 1fr);
            position: sticky;
            top: 3em;
            z-index: 10;
            border-bottom: 2px solid antiquewhite;
        }

        .day {
            border-left: 1px solid antiquewhite;
        }

        .content {
            display: grid;
            grid-template-columns: 3em 10px repeat(7, 1fr);
            /*grid-template-rows: repeat(10, 3em);*/
        }

        .time {
            grid-column: 1;
            text-align: right;
            align-self: end;
            font-size: 80%;
            position: relative;
            bottom: -1ex;
            color: antiquewhite;
            padding-right: 2px;
        }

        .col {
            border-right: 1px solid antiquewhite;
            /*grid-row: 1/span 10;*/
            grid-column: span 1;
        }

        .col.monday {
            grid-column: 3;
        }

        .col.tuesday {
            grid-column: 4;
        }

        .col.wednesday {
            grid-column: 5;
        }

        .col.thursday {
            grid-column: 6;
        }

        .col.friday {
            grid-column: 7;
        }

        .col.saturday {
            grid-column: 8;
        }

        .col.sunday {
            grid-column: 9;
        }

        .filler-col {
            grid-row: 1/-1;
            grid-column: 2;
            border-right: 1px solid antiquewhite;
        }

        .row {
            grid-column: 2/-1;
            border-bottom: 1px solid antiquewhite;
        }

        .event {
            border-radius: 5px;
            padding: 5px;
            margin-right: 10px;
            font-weight: bold;
            font-size: 80%;
            text-decoration: none;
            color: antiquewhite;
            background-color: #8C3A18;
            border-color: #bcc3e5;
        }

        .event:hover {
            color: #fff;
            background-color: #DF5F2C;
        }

        .weekend {
            background-color: #151515;
        }

        .current {
            font-weight: bold;
        }

        .footerPadding {
            padding-bottom: 500px;
        }
    </style>

    <div class="has-text-centered m-3">
        <a class="button is-warning is-outlined is-responsive" href="alle-reserveringen.php">
            Alle reserveringen bekijken
        </a>
        <a class="button is-warning is-outlined is-responsive" href="reserveringen.php">
            Reservering toevoegen
        </a>
        <a class="button is-warning is-outlined is-responsive" href="users.php">
            Gebruikers
        </a>
        <a class="button is-warning is-outlined is-responsive" href="logout.php">
            Log uit
        </a>
    </div>
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