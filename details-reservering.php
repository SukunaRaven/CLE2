
<?php
session_start();
require_once 'connection/connection.php';

$login = false;
//am I even logged in? if not, send me to the loginpage
if (!isset($_SESSION['user']) ||
    $_SESSION['admin_flag'] != '1'
) {

    header("Location: login.php");

    // Is user logged in?
}
/** @var mysqli $db */
$id = mysqli_escape_string($db, $_GET['id']);

$query = "SELECT * FROM reservations WHERE id=$id";

$result = mysqli_query($db, $query) or die("Error");

$reservation = mysqli_fetch_assoc($result);


if (!isset($_GET['id']) || $_GET['id'] == ['']) {
    header('Location: admin.php');
    exit;
}

if (mysqli_num_rows($result) != 1) {
    header('Location: admin.php');
    exit;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation - Details <?= $reservation['name'] ?> </title>
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"
    >
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<header class="hero is-link">
    <div class="hero-body">
        <p class="title">Reservation details</p>
    </div>
</header>

<main class="containerDETAIL">
    <section class="section content">
        <ul>
            <li>Datum: <?= $reservation['date'] ?> </li>
            <li>Tijs: <?= $reservation['time'] ?> years old</li>
            <li>Naam: <?= $reservation['name'] ?> </li>
            <li>Aantal gasten: <?= $reservation['guests'] ?> </li>
            <li>E-mail: <?= $reservation['email'] ?> </li>
            <li>Telefoonnummer: <?= $reservation['phone'] ?> </li>
            <li>Opmerking: <?= $reservation['comments'] ?> </li>
        </ul>
        <a class="button" href="alle-reserveringen.php">Terug naar alle reserveringen</a>
    </section>

</main>
</body>
</html>
