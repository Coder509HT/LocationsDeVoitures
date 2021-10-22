<?php
session_start();

require_once('../../web/autoloader/autoload-classes.php');

$usersView = new UsersView();
$usersController = new UsersController();

$response = (object)[
    'status' => 'error',
    'message' => 'Désolé! Une erreur est survenue, veuillez réessayer plus tard.'
];

if (isset($_POST['login'])) {


    $responseConnect = $usersView->getUser($_POST['username'], $_POST['password']);

    if (!$usersView->usernameTaken($_POST['username'])) {
        $response->status = 'error';
        $response->message = 'Votre compte est invalide.';
    } elseif (!$responseConnect->status) {
        $response->status = 'error';
        $response->message = 'Votre mot de passe est incorrect.';
    } else {
        $response->status = 'success';
    }
}

if ($response->status === 'success') {
    $usersController->updateStatusUser(true, $responseConnect->user->id);
    $_SESSION['user'] = $responseConnect->user;
    header('location: ../../web/pages/chat.php');
} else {
    $_SESSION['response'] = $response;
    header('location: ../../web/pages/login.php');
}
exit();
