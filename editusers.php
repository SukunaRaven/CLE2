<?php
session_start();

//$login = false;
//
//if (!isset($_SESSION['user'])) {
//    header('Location: login.php');
//    exit();
//}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $phonenumber = $_POST['phoneNumber'];
    $name = $_POST['name'];
    $admin_flag = $_POST['admin_flag'];
    $id = $_GET['id'];

    $errors = [];
    if ($email === '') {
        $errors['email'] = "Email mag niet leeg zijn";
    }

    if ($phonenumber === '') {
        $errors['phoneNumber'] = "Telefoonnummer mag niet leeg zijn";
    }

    if ($name === '') {
        $errors['name'] = "Naam mag niet leeg zijn";
    }

    if (empty($errors)) {
        require_once('connection/connection.php');

        $query = "UPDATE `users` SET `email`='$email',`phonenumber`='$phonenumber',
                   `name`='$name',`admin_flag`='$admin_flag' WHERE 1";

        /** @var $db mysqli */
        $result = mysqli_query($db, $query)
        or exit('Error ' . mysqli_error($db) . ' with query ' . $query);

        mysqli_close($db);

        header('Location: users.php');
        exit;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.cdnfonts.com/css/imagination-station" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/open-sans" rel="stylesheet">
    <title>Edit Gebruikers</title>
</head>

<?php include "./Nav/nav.php" ?>

<body>
<header class="background-image is-primary is-medium">
    <section class="hero is-height">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-1 shadow has-text-link">Edit Gebruikers</h1>
            </div>
        </div>
    </section>
</header>

<main>
    <form class="column is-6 container" action="" method="post">

        <div class="field is-vertical">
            <div class="field-label is-normal has-text-left">
                <label class="label" for="name">Email</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <input class="input is-link" id="email" type="text" name="email"
                               value="<?= ($email ?? '') ?>"/>
                    </div>
                    <p class="help is-danger">
                        <?= $errors['email'] ?? '' ?>
                    </p>
                </div>
            </div>
            <div class="field-label is-normal has-text-left">
                <label class="label" for="year">Telefoon Nummer</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <input class="input is-link" id="phoneNumber" type="text" name="phoneNumber"
                               value="<?= ($telefoonnummer ?? '') ?>"/>
                    </div>
                    <p class="help is-danger">
                        <?= $errors['phoneNumber'] ?? '' ?>
                    </p>
                </div>
            </div>
            <div class="field-label is-normal has-text-left">
                <label class="label" for="genre">Naam</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <input class="input is-link" id="name" type="text" name="name"
                               value="<?= ($name ?? '') ?>"/>
                    </div>
                    <p class="help is-danger">
                        <?= $errors['name'] ?? '' ?>
                    </p>
                </div>
            </div>
            <div class="field-label is-normal has-text-left">
                <label class="label" for="genre">Verander Functie</label>
            </div>
            <div class="select is-link">
                <select>
                    <option>Selecteer functie</option>
                    <option>User</option>
                    <option>Admin</option>
                </select>
            </div>

        </div>
        </div>


        <div class="field is-vertical">
            <div class="field-label is-normal"></div>
            <div class="field-body">
                <button class="button is-link is-outlined is-fullwidth" type="submit" name="submit">Opslaan</button>
            </div>
        </div>
        <div class="field is-vertical">
            <div class="field-label"></div>
            <div class="field-body">
                <button class="button is-primary is-outlined"><a class="has-text-centered has-text-primary is-outlined" href="users.php">Users</a></button>
            </div>
        </div>
    </form>
</main>

<footer class="has-background-info">
    <div class="footerRow">
        <div class="socialmediaFormat"><p>Follow Us!</p>
            <div class="logoRows">
                <a href="https://www.instagram.com/broers.ridderkerk">
                    <i class="fa fa-instagram" style="font-size:30px"></i>
                </a>

                <a href="https://www.facebook.com/profile.php?id=61562490741128">
                    <i class="fa fa-facebook-square" style="font-size:30px"></i>
                </a>
            </div>
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