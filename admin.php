<?php

/** @var $db mysqli */
require_once 'connection/connection.php';

$query = "SELECT * FROM reservations";

$result = mysqli_query($db, $query)
or exit('Error ' . mysqli_error($db) . ' with query ' . $query);

$reservations = [];

while ($row = mysqli_fetch_assoc($result)) {

    $reservations[] = $row;
}
$number = '';
mysqli_close($db);
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

<?php include "./Nav/nav.php" ?>

<body>
<main>
    <section class="footerPadding">

        <div class="m-3">
            <a class="button is-warning is-outlined is-responsive" href="reserveringen.php">Reservering toevoegen </a>
        </div>

        <table class="table table is-striped is-hoverable mx-auto" action="" method="post">

            <div class="left">
                <thead>

                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>E-mail</td>
                    <td>Telefoonnummer</td>
                    <td>Aantal gasten</td>
                    <td>Datum</td>
                    <td>Tijd</td>
                </tr>
                </thead>

                <tbody>


                <?php foreach ($reservations as $number => $reservation) { ?>
                    <tr>

                            <td><?= $number + 1 ?> </td>
                            <td> <?= $reservation['name'] ?> </td>
                            <td> <?= $reservation['email'] ?> </td>
                            <td> <?= $reservation['phone'] ?> </td>
                            <td> <?= $reservation['guests'] ?> </td>
                            <td> <?= $reservation['date'] ?></td>
                            <td> <?= $reservation['time'] ?></td>
                            <td><a href="details.php?id=<?= $reservation['id'] ?>">details</a></td>
                            <td><a href="edit.php?id=<?= $reservation['id'] ?>">edit</a></td>
                            <td><a href="#<?= $reservation['id'] ?>">delete</a></td>

                    </tr>

                <?php } ?>

                </tbody>
            </div>
        </table>

    </section>

    <style>
.footerPadding {
    padding-bottom: 500px;
}
    </style>
</main>
</body>
<footer class="has-background-info">
    <div class="footerRow">
        <div><p>Follow Us!</p>
            <a href="https://www.instagram.com/broers.ridderkerk">
                <i class="fa fa-instagram" style="font-size:30px"></i>
            </a>

            <a href="https://www.facebook.com/profile.php?id=61562490741128">
                <i class="fa fa-facebook-square" style="font-size:30px" ></i>
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
</html>