<?php
session_start();

require_once('../../web/autoloader/autoload-classes.php');

$usersController = new UsersController();

if (isset($_POST['logout'])) {

    $date = new DateTime('NOW', new DateTimeZone('America/New_York'));

    $usersController->updateUserConnect(false, $date->format('Y-m-d h:i:s'), $_SESSION['user']->id);
    unset($_SESSION['user']);
    session_destroy();
    header('location: ../../web/pages/accueil.php');
    exit();
}
