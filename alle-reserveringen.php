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
$query = "SELECT * FROM reservations ORDER BY date ASC, start_time ASC";

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

<nav class="navbar has-background-info" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item">
            <figure class="image is-32x32">
                <a href="homepage.php" target="_self"><img class="is-rounded" src="Images/BroersLogo.png"
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
                <a class="button is-warning is-normal is-responsive" href="select-date.php">Reservering
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
                        <td> <?= $reservation['start_time'] ?></td>
                        <td> <?= $reservation['name'] ?> </td>
                        <td> <?= $reservation['guests'] ?> </td>
                        <td> <?= $reservation['email'] ?> </td>
                        <td> <?= $reservation['phone'] ?></td>
                        <td> <?= $reservation['comments'] ?></td>
                        <td class="is-flex iconGap">
                            <a href="details-reservering.php?id=<?= $reservation['id'] ?>"><i
                                        class="fa fa-calendar-o" style="color:#8C3A18"></i></i></a>

                            <a href="edit-reservering.php?id=<?= $reservation['id'] ?>"><i class="fa fa-pencil"
                                                                                           style="color:darkgray"></i></a>

                            <a href="delete-reservering.php?id=<?= $reservation['id'] ?>"><i class="fa fa-trash"
                                                                                             style="color:firebrick"></i></a>
                        </td>
                        <?php } ?>


                    </tr>


                    </tbody>
                </div>
            </table>
        </section>
    </div>
</main>
</body>


</html>
