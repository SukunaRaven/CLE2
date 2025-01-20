<?php
session_start();
$login = false;


//am I even logged in? if not, send me to the loginpage
if (!isset($_SESSION['user']) ||
    $_SESSION['admin_flag'] != '1'
) {

    header("Location: login.php");

    // Is user logged in?
}
/** @var $db mysqli */
require_once 'connection/connection.php';

$query = "SELECT * FROM users";

$result = mysqli_query($db, $query)
or exit('Error ' . mysqli_error($db) . ' with query ' . $query);

$users = [];

while ($row = mysqli_fetch_assoc($result)) {

    $users[] = $row;
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
    <link href="https://fonts.cdnfonts.com/css/imagination-station" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/open-sans" rel="stylesheet">
</head>

<?php include "./Nav/nav.php" ?>

<body>
<main>
    <section class="footerPadding">

        <table class="table table is-striped is-hoverable mx-auto" action="" method="post">

            <div class="left">
                <thead>

                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>E-mail</td>
                    <td>Telefoonnummer</td>
                    <td>Admin</td>

                </tr>
                </thead>

                <tbody>


                <?php foreach ($users as $number => $user) { ?>
                    <tr>

                        <td><?= $number + 1 ?> </td>
                        <td> <?= $user['name'] ?> </td>
                        <td> <?= $user['email'] ?> </td>
                        <td> <?= $user['phonenumber'] ?></td>
                        <td> <?= $user['admin_flag'] ?></td>
                        <td><a href="editusers.php">Edit</a></td>
                        <td><a href="deleteusers.php?id=<?= $user['id'] ?>">Delete</a></td>

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