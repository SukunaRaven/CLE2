<?php
if (isset($_POST['submit'])) {
    /** @var mysqli $db */
    require_once "connection/connection.php";

    // Get form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Server-side validation

    $errors = [];
    if ($firstName === '') {
        $errors['firstName'] = 'First name cannot be empty';
    }

    if ($lastName === '') {
        $errors['lastName'] = 'Last name cannot be empty';
    }

    if ($email === '') {
        $errors['email'] = 'E-mail cannot be empty';
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email is not valid';
        } else {
            $query = "SELECT * FROM users WHERE email = '$email'";

            $result = mysqli_query($db, $query)
            or die('Error ' . mysqli_error($db) . ' with query ' . $query);

            if (mysqli_fetch_assoc($result)) {
                $errors['email'] = 'this user already exist';
            }
        }
    }

    if ($password === '') {
        $errors['password'] = 'Password cannot be empty';
    } else {
        if (strlen($password) < 8) {
            $errors['password'] = 'Password must be at least 8 characters';
        }
    }

    if (empty($errors)) {

        // create a secure password, with the PHP function password_hash()
        $securePassword = password_hash($password, PASSWORD_DEFAULT);

        // store the new user in the database.
        $query = "INSERT INTO `users`(`email`,`password`, `first_name`, `last_name`) VALUES ('$email','$securePassword','$firstName','$lastName')";

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
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Broers Smaakmakers</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"
    >
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
<nav class="navbar has-background-info" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item">
            <figure class="image is-32x32">
                <a href="homepage.php" target="_self"><img class="is-rounded" src="Images/Broers%20Logo.png" alt="Logo" /></a>
            </figure>
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div class="navbar-menu">
        <div class="navbar-end">
            <a id="button" href="aanbod.php" class="navbar-item is-link">
                Ons Aanbod
            </a>

            <a href="menu.php" class="navbar-item is-link">
                Ons Menu
            </a>

            <a href="reserveringen.php" class="navbar-item is-link">
                Reserveer
            </a>

            <a href="contact.php" class="navbar-item is-link">
                Contact
            </a>

            <a href="reviewspage.php" class="navbar-item is-link">
                Onze Reviews
            </a>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a href="register.php" class="button is-link is-outlined">
                            <strong>Registreren</strong>
                        </a>

                        <a href="login.php" class="button is-link is-outlined">
                            Log In
                        </a>

                        <a href="logout.php" class="button is-primary is-outlined">
                            Log Uit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</nav>


</body>
</html>
