<?php

if (isset($_POST['submit'])) {
    /** @var mysqli $db */
    require_once "connection/connection.php";

    $review = $_POST['review'];
    $user_id = $_SESSION['loggedInUser'];
    echo $user_id;

    $query = "INSERT INTO `reviews`(`review`,`user_id`) 
              VALUES ('$review', '$user_id')";

    $result = mysqli_query($db, $query)
    or exit('Error ' . mysqli_error($db) . ' with query ' . $query);

    mysqli_close($db);
    // If query succeeded
    if ($result) {

        // Redirect to login page
        header('location: login.php');
        // Exit the code
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
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"
    >
    <link rel="stylesheet" href="CSS/style.css">
    <title>Broers Smaakmakers</title>
</head>

<body>

<?php include "./Nav/nav.php" ?>

<header class="background-image is-primary is-medium">
    <section class="hero is-halfheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-1 shadow has-text-link">Eetcafé Broers</h1>
            </div>
        </div>
    </section>
</header>

<section class="section">
    <div class="container content">

        <section class="columns is-centered">
            <form class="column is-6" action="" method="post">

                <div class="field-label is-normal">
                    <label class="label has-text-centered" for="name">Naam</label>
                </div>
                <div class="field is-horizontal">
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input is-link" id="firstname" type="text" placeholder="Naam" name="comments"/>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="field-label is-normal">
                    <label class="label has-text-centered" for="comments">
                        Commentaar
                    </label>
                </div>
                <div class="field is-horizontal">
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <textarea cols="47" rows="6" class="textarea is-link" placeholder="Schrijf hier uw review!" id="textArea" name="textarea"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <div class="field-body">
                            <button class="button is-outlined is-link " type="submit" name="submit">
                                Plaats review
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </section>

    </div>
</section>

<section>
    <h1>Reviews</h1>
<!--    <h2>--><?php //= $reviews['review'] ?><!--</h2>-->
</section>

<footer class="has-background-info">
    <div class="footerRow">
        <div><p>Follow Us!</p>
            <a href="https://www.instagram.com/broers.ridderkerk">
                <i class="fa fa-instagram" style="font-size:24px"></i>
            </a>
            <a href="https://www.tiktok.com/@broers.ridderkerk">
                <i class="fa-brands fa-tiktok" style="font-size:24px"></i>
            </a>
            <a href="https://www.facebook.com/profile.php?id=61562490741128">
                <i class="fa fa-facebook-square" style="font-size:24px"></i>
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
