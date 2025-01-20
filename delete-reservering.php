<?php

/** @var mysqli $db */

session_start();

$login = false;

//am I even logged in? if not, send me to the loginpage
if (!isset($_SESSION['user']) ||
    $_SESSION['admin_flag'] != '1'
) {

    header("Location: login.php");

    // Is user logged in?
}

$id = $_GET['id'];

require_once 'connection/connection.php';

$query = "DELETE FROM `reservations` WHERE id = '$id'";

/** @var $db mysqli */
$result = mysqli_query($db, $query)
or die('Error ' . mysqli_error($db) . ' with query ' . $query);

mysqli_close($db);

header('location: alle-reserveringen.php');

exit();

?>

