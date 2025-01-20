<?php
/** @var mysqli $db */
require_once "connection/connection.php";

session_start();

// post review
if (isset($_POST['submit'])) {

    //get form data
    $review = $_POST['review'];
    $user_id = $_SESSION['user_id'];


    $query = "INSERT INTO `reviews`(review, user_id) VALUES 
                 ('$review', '$user_id')";

    $result = mysqli_query($db, $query)
    or exit('Error ' . mysqli_error($db) . ' with query ' . $query);


}

// show review details

//left join to get data from users table
$query = "SELECT reviews.*, users.name FROM reviews LEFT JOIN users ON reviews.user_id = users.id";

$result = mysqli_query($db, $query);
$reviews = [];


while ($row = mysqli_fetch_assoc($result)) {
    // Add the row to the $reviews array
    $reviews[] = $row;
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
                    <label class="label has-text-centered" for="comments">
                        Laat hier een review achter
                    </label>
                </div>
                <div class="field is-horizontal">
                    <div class="field-body">
                        <div class="field">
                            <div class="control">

                                <textarea class="is-link textarea" cols="89" rows="6" name="review"
                                          value="<?= $review ?? '' ?>"></textarea>

                                <p class="help is-danger">
                                    <?= $errorReview ?? '' ?>
                                </p>
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
    <!--loop through array-->
    <?php foreach ($reviews as $review) { ?>
        <h2><?= $review['name'] ?></h2>
        <h2><?= $review['review'] ?></h2>
        <!--<h2>--><?php //= $review['user_id'] ?><!--</h2>-->
    <?php } ?>
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
