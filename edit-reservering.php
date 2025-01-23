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
//making a variable called id where I store the id
$id = mysqli_escape_string($db, $_GET['id']);

//query that selects everything where the id is the send id through the url
$query = "SELECT * FROM reservations WHERE id=$id";

//mysqli result that gets stored in this variable
$result = mysqli_query($db, $query) or die("Error");

$reservation = mysqli_fetch_assoc($result);
$errors = [''];

// Maak een array met tijden van 11:00 - 20:00 met stappen van 15 minuten.
$times = [];
$time = strtotime('11:00');
$timeToAdd = 15;

// Blijf de times array vullen totdat 20:00 bereikt wordt.
while ($time <= strtotime(datetime: '20:00')) {
    // time toevoegen aan times array
    $times[] = date('H:i', $time);

    // time + een kwartier optellen
    $time += 15 * 60;
}

// doorloop alle tijden (van 11:00 - 20:00)
foreach ($times as $time) {
    $time = strtotime($time);
    $occurs = false;
    $reservationCounter = 1;
}

$selectedTime = '';
$availableTimes = [];
$startTime = [];
$startTime = strtotime($reservation['start_time']);
$startTime = date('H:i', $startTime);

if (isset($_POST['submit'])) {

    $reservation['date'] = $_POST['date'];
    $reservation['start_time'] = $_POST['start_time'] ?? null;;
    $reservation['name'] = $_POST['name'];
    $reservation['guests'] = $_POST['guests'];
    $reservation['email'] = $_POST['email'];
    $reservation['phone'] = $_POST['phone'];
    $reservation['comments'] = $_POST['comments'];

    $date = $reservation['date'];
    $selectedTime = mysqli_real_escape_string($db, $_POST['start_time']);
    $name = $reservation['name'];
    $guests = $reservation['guests'];
    $email = $reservation['email'];
    $phone = $reservation['phone'];
    $comments = $reservation['comments'];

    $dataValid = true;

    if ($reservation['name'] == '') {
        $errors['name'] = "what is... nameless?";
        $dataValid = false;
    }

    if ($reservation['phone'] == '') {
        $errors['phone'] = "Telefoonnummer mag niet leeg zijn";
        $dataValid = false;
    } else if (!is_numeric($phone)) {
        $errors['phone'] = "Telefoonnummer mag alleen bestaan uit nummers";
        $dataValid = false;
    }

    if ($reservation['date'] == '') {
        $errors['date'] = "Datum mag niet leeg zijn";
        $dataValid = false;
    }
    if ($reservation['start_time'] == '') {
        $errors['start_time'] = "Tijd mag niet leeg zijn";
        $dataValid = false;
    }

    if ($reservation['guests'] == '') {
        $errors['guests'] = "Gasten mag niet leeg zijn";
        $dataValid = false;
    }

    if ($reservation['email'] == '') {
        $errors['email'] = "Email mag niet leeg zijn";
        $dataValid = false;
    }


    if ($dataValid) {
        $start_time = [];
        $editQuery = "UPDATE reservations SET `name`='$name',`phone`='$phone',`date`='$date',`start_time`='$start_time',`guests`='$guests', `email`='$email', `comments`='$comments' WHERE id=$id";
        echo $editQuery;

        $result = mysqli_query($db, $editQuery) or die("Error");
        header('Location: index.php');
        exit;
    }
}

if (!isset($_GET['id']) || $_GET['id'] == ['']) {
    header('Location: index.php');
    exit;
}

if (mysqli_num_rows($result) != 1) {
    header('Location: index.php');
    exit;
}

mysqli_close($db);
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
    <title>Reservering bewerken</title>
</head>
<body>
<style>
    .errorSpacing {
        color: red;
        margin-left: 130px;

    }
</style>
<header class="hero is-link">
</header>
<div class="is-empty mt-5"></div>
<div class="container px-4">
    <section class="columns">
        <form class="column is-6" action="" method="post">
            <!--Name-->
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="name">Naam</label>
                </div>
                <div class="field-body">

                    <input class="input" id="name" type="text" name="name"
                           value="<?= htmlentities($reservation['name']) ?>"/>
                </div>

            </div>
            <p class="errorSpacing"> <?= $errors['name'] ?? '' ?> </p>

            <!--Phone-->

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="phone">phone</label>
                </div>
                <div class="field-body">
                    <input class="input" id="phone" type="text" name="phone"
                           value="<?= htmlentities($reservation['phone']) ?>"/>
                </div>
            </div>
            <p class="errorSpacing"> <?= $errors['phone'] ?? '' ?>  </p>

            <!--Date-->

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="date">Datum</label>
                </div>
                <div class="field-body">
                    <input class="input" id="date" type="text" name="date"
                           value="<?= htmlentities($reservation['date']) ?>"/>
                </div>
            </div>
            <p class="errorSpacing"> <?= $errors['date'] ?? '' ?> </p>

            <!--Time-->
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="start_time">Tijd</label>
                </div>
                <div class="field-body">
                    <select id="start_time" name="start_time">
                        <option value="">Kies een tijd</option>
                        <?php foreach ($availableTimes as $availableTime) { ?>
                            <option value="<?= $availableTime ?>" <?= $selectedTime == $availableTime ? 'selected' : '' ?>><?= $availableTime ?></option>
                        <?php } ?>
                    </select>
                </div>
                <p class="help is-danger">
                    <?= $errors['time'] ?? '' ?>
                </p>
            </div>

            <!--Guests-->

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="guests">Gasten</label>
                </div>
                <div class="field-body">
                    <textarea class="textarea" id="guests"
                              name="guests"><?= htmlentities($reservation['guests']) ?></textarea>
                </div>
            </div>
            <p class="errorSpacing"> <?= $errors['guests'] ?? '' ?> </p>

            <!--X-->

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="guests">Email</label>
                </div>
                <div class="field-body">
                    <textarea class="textarea" id="email"
                              name="email"><?= htmlentities($reservation['email']) ?></textarea>
                </div>
            </div>
            <p class="errorSpacing"> <?= $errors['email'] ?? '' ?> </p>

            <!--X-->

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="guests">Opmerking</label>
                </div>
                <div class="field-body">
                    <textarea class="textarea" id="comments"
                              name="comments"><?= htmlentities($reservation['comments']) ?></textarea>
                </div>
            </div>
            <p class="errorSpacing"> <?= $errors['comments'] ?? '' ?> </p>

            <div class="field is-horizontal">
                <div class="field-label is-normal"></div>
                <div class="field-body">
                    <button class="button is-link is-fullwidth" type="submit" name="submit">Save</button>
                </div>
            </div>
        </form>
    </section>


    <a class="button mt-4" href="alle-reserveringen.php">&laquo;Terug naar alle reserveringen</a>

</body>
</html>


