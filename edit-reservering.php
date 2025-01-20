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
if (isset($_POST['submit'])) {

    $reservation['date'] = $_POST['date'];
    $reservation['time'] = $_POST['time'];
    $reservation['name'] = $_POST['name'];
    $reservation['guests'] = $_POST['guests'];
    $reservation['email'] = $_POST['email'];
    $reservation['phone'] = $_POST['phone'];
    $reservation['comments'] = $_POST['comments'];

    $date = $reservation['date'];
    $time = $reservation['time'];
    $name = $reservation['name'];
    $guests = $reservation['guests'];
    $email = $reservation['email'];
    $phone = $reservation['phone'];
    $comments = $reservation['comments'];

    $dataValid = true;

    if ($cat['name'] == '') {
        $errors['name'] = "what is... nameless?";
        $dataValid = false;
    }

    if ($cat['age'] == '') {
        $errors['age'] = "why is it empty?";
        $dataValid = false;
    } else if (!is_numeric($age)) {
        $errors['age'] = "must contain ONLY numbers";
        $dataValid = false;
    }

    if ($cat['breed'] == '') {
        $errors['breed'] = "if you dont know, what are you doing?";
        $dataValid = false;
    }
    if ($cat['ranking'] == '') {
        $errors['ranking'] = "rank is required";
        $dataValid = false;
    } elseif ($cat['ranking'] != 'S' && $cat['ranking'] != 'SS') {
        $errors['ranking'] = "S or SS required";
        $dataValid = false;
    }


    if ($cat['description'] == '') {
        $errors['description'] = "description is required";
        $dataValid = false;
    }


    if ($dataValid) {
        $editQuery = "UPDATE cats SET `name`='$name',`age`='$age',`breed`='$breed',`ranking`='$ranking',`description`='$description' WHERE id=$id";
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
    <div class="hero-body">
        <h1 class="title mt-4">Upgrade CAT</h1>
        <p class="subtitle">EMPOWER, UPGRADE, ENHANCE </p>
    </div>
</header>
<div class="is-empty mt-5"></div>
<div class="container px-4">
    <section class="columns">
        <form class="column is-6" action="" method="post">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="name">Name</label>
                </div>
                <div class="field-body">

                    <input class="input" id="name" type="text" name="name"
                           value="<?= htmlentities($cat['name']) ?>"/>
                </div>

            </div>
            <p class="errorSpacing"> <?= $errors['name'] ?? '' ?> </p>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="age">Age</label>
                </div>
                <div class="field-body">
                    <input class="input" id="age" type="text" name="age" value="<?= htmlentities($cat['age']) ?>"/>
                </div>
            </div>
            <p class="errorSpacing"> <?= $errors['age'] ?? '' ?>  </p>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="breed">Breed</label>
                </div>
                <div class="field-body">
                    <input class="input" id="breed" type="text" name="breed"
                           value="<?= htmlentities($cat['breed']) ?>"/>
                </div>
            </div>
            <p class="errorSpacing"> <?= $errors['breed'] ?? '' ?> </p>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="ranking">Rank</label>
                </div>
                <div class="field-body">
                    <input class="input" id="ranking" type="text" name="ranking"
                           value="<?= htmlentities($cat['ranking']) ?>"/>
                </div>
            </div>
            <p class="errorSpacing"> <?= $errors['ranking'] ?? '' ?> </p>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="description">Description</label>
                </div>
                <div class="field-body">
                    <textarea class="textarea" id="description"
                              name="description"><?= htmlentities($cat['description']) ?></textarea>
                </div>
            </div>
            <p class="errorSpacing"> <?= $errors['description'] ?? '' ?> </p>
            <div class="field is-horizontal">
                <div class="field-label is-normal"></div>
                <div class="field-body">
                    <button class="button is-link is-fullwidth" type="submit" name="submit">Save</button>
                </div>
            </div>
        </form>
    </section>


    <a class="button mt-4" href="index.php">&laquo;back to tierlist</a>
    <div class="imgToRight">
        <img width="300" height="200" src="images/cathammer.jpg" alt="cat with hammer">

    </div>
</body>
</html>


