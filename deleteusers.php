<?php
session_start();

$id = $_GET['id'];

require_once 'connection/connection.php';

$query = "DELETE FROM `users` WHERE id = '$id'";

/** @var $db mysqli */
$result = mysqli_query($db, $query)
or die('Error ' . mysqli_error($db) . ' with query ' . $query);

mysqli_close($db);

header('location: users.php');

exit();

?>
