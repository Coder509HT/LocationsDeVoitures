<?php
session_start();

require_once('../../web/autoloader/autoload-classes.php');

$usersController = new UsersController();

if (isset($_POST['logout'])) {
    $usersController->updateStatusUser(false, $_SESSION['user']->id);
    unset($_SESSION['user']);
    session_destroy();
    header('location: ../../web/pages/accueil.php');
    exit();
}
