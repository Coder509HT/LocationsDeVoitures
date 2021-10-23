<?php
session_start();

require_once('../autoloader/autoload-classes.php');

if (!isset($_SESSION['user'])) {
    header('location: ./login.php');
    exit();
}

$usersView = new UsersView();
$messagesView = new MessagesView();

$users = $usersView->usersList();
$messages = $messagesView->messagesList();

$currentUser = $_SESSION['user'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat | AnyCar</title>
    <link type="text/css" rel="stylesheet" href="../css/chat.css">
</head>

<body>
    <?php require_once('./header.php'); ?>

    <section class="chat-section">
        <section class="chat-user-section">
            <!-- USSERS -->
            <?php
            if (count($users) > 0) {
            ?>
                <section class="users-list">
                    <?php
                    foreach ($users as $user) {

                        if ($user->id !== $currentUser->id) {
                            $status = ($user->login) ? "en ligne" : "hors ligne";
                            $statusLight = ($user->login) ? "enligne" : "horsligne";
                    ?>
                            <section class="user">
                                <p class="logo-name"><?= strtoupper(substr($user->pseudo, 0, 1)); ?></p>
                                <div class="username-section">
                                    <p class="username"><?= ucfirst($user->pseudo); ?></p>
                                    <section class="status-section">
                                        <p class="status"><?= $status; ?></p>
                                        <div class="status-light <?= $statusLight; ?>"></div>
                                    </section>
                                </div>
                            </section>
                    <?php
                        }
                    }
                    ?>
                </section>
            <?php
            }
            ?>

            <!-- MESSAGES -->
            <section class="messages-section">
                <section class="message-box">
                    <?php
                    if (count($messages) == 0) {
                    ?>
                        <h1 class="message-infos">La boîte de messagerie est vide</h1>
                        <?php
                    } else {
                        foreach ($messages as $message) {
                            $messageType = ($currentUser->id === $message->idUtilisateur) ? "send" : "received";
                        ?>
                            <div class="message <?= $messageType; ?>">
                                <div class="user">
                                    <p class="logo-name"><?= strtoupper(substr($message->pseudo, 0, 1)); ?></p>
                                    <p class="username"><?= ucfirst($message->pseudo); ?></p>
                                </div>
                                <p class="message-text"><?= $message->message; ?></p>
                                <section class="date-section">
                                    <p class="date"><?= $message->dateEnvoie; ?></p>
                                </section>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </section>
            </section>
        </section>

        <form class="messages-form" action="../../src/servers/messages.php" method="POST">
            <input type="hidden" name="id" value=<?= $currentUser->id; ?>>
            <input type="text" name="text" id="text" required>
            <input type="submit" name="send" value="Envoye">
        </form>
    </section>
</body>

</html>