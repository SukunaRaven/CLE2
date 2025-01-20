<?php
session_start();
require_once 'connection/connection.php';
/** @var mysqli $db */
$login = false;

//am I even logged in? if not, send me to the loginpage
if (!isset($_SESSION['user']) ||
    $_SESSION['admin_flag'] != '1'
) {

    header("Location: login.php");

    // Is user logged in?
}
$query = "SELECT * FROM reservations";

$result = mysqli_query($db, $query)
or die('Error ' . mysqli_error($db) . ' with query ' . $query);

$reservations = [];

while ($row = mysqli_fetch_assoc($result)) {
    $reservations[] = $row;
}
//&&
mysqli_close($db);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alle reserveringen overzicht</title>
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"
    >
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<?php include "./Nav/nav.php" ?>
<main class="has-background-info ">


    <style>
        * {
            background-color: #151515;
        }

        body {
            background-color: #151515;
        }

        .tableBg {
            background-color: #151515;

        }

        footer {
            position: absolute;
            right: 0;
            bottom: 0;
            left: 0;
        }

        .iconGap {
            gap: 10px;
        }

    </style>

    <div class=" is-flex is-flex-direction-row is-justify-content-center">
        <section>

            <div class="m-3">
                <a class="button is-warning is-normal is-responsive" href="reserveringen.php">Reservering
                    toevoegen</a>
            </div>

            <table class="table mx-auto tableBg" action="" method="post">

                <div class="left">
                    <thead>

                    <tr>
                        <th>Datum</th>
                        <th>Tijd</th>
                        <th>Naam</th>
                        <th>Aantal gasten</th>
                        <th>E-mail</th>
                        <th>Telefoonnummer</th>
                        <th>Opmerking</th>

                    </tr>
                    </thead>


                    <tbody>
                    <?php foreach ($reservations

                    as $index => $reservation) { ?>
                    <tr>

                        <td> <?= $reservation['date'] ?> </td>
                        <td> <?= $reservation['time'] ?></td>
                        <td> <?= $reservation['name'] ?> </td>
                        <td> <?= $reservation['guests'] ?> </td>
                        <td> <?= $reservation['email'] ?> </td>
                        <td> <?= $reservation['phone'] ?></td>
                        <td> <?= $reservation['comments'] ?></td>
                        <?php foreach ($reservations as $index => $reservation) { ?>
                            <td class="is-flex iconGap">
                                <a href="details-reservering.php?id=<?= $reservation['id'] ?>"><i
                                            class="fa fa-calendar-o" style="color:#8C3A18"></i></i></a>

                                <a href="edit-reservering.php?id=<?= $reservation['id'] ?>"><i class="fa fa-pencil"
                                                                                               style="color:darkgray"></i></a>

                                <a href="delete-reservering.php?id=<?= $reservation['id'] ?>"><i class="fa fa-trash"
                                                                                                 style="color:firebrick"></i></a>
                            </td>
                        <?php } ?>
                        <?php } ?>


                    </tr>


                    </tbody>
                </div>
            </table>
        </section>
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
