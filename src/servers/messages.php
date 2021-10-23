<?php

require_once('../../web/autoloader/autoload-classes.php');

$messagesController = new MessagesController();

if (isset($_POST['send'])) {
    $date = new DateTime('NOW', new DateTimeZone('America/New_York'));

    $message = (object)[
        'idUtilisateur' => $_POST['id'],
        'message' => $_POST['text'],
        'dateEnvoie' => $date->format('Y-m-d h:i:s')
    ];

    $messagesController->createMessage($message);
}

header('location: ../../web/pages/chat.php');
exit();
