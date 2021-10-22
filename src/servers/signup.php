<?php
session_start();

require_once('../../web/autoloader/autoload-classes.php');

$response = (object)[
    'status' => 'error',
    'message' => 'Désolé! Une erreur est survenue, veuillez réessayer plus tard.'
];

if (isset($_POST['signup'])) {

    $user = (object)[
        'username' => $_POST['username'],
        'password' => $_POST['password']
    ];

    $usersView = new UsersView();
    $usersController = new UsersController();

    if ($usersView->usernameTaken($user->username)) {
        $response->status = 'error';
        $response->message = 'Le pseudo est déjà pris.';
    } elseif ($user->password !== $_POST['passwordConfirmation']) {
        $response->status = 'error';
        $response->message = 'Vos mot de passes sont incompatibles.';
    } else {
        if (!$usersController->createAccount($user)) {
            $response->status = 'error';
        } else {
            $response->status = 'success';
            $response->message = 'Votre compte à été crée avec succès';
        }
    }
}

$_SESSION['response'] = $response;
header('location: ../../web/pages/signup.php');
exit();
