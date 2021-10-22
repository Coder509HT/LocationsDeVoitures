<?php
session_start();

require_once('../autoloader/autoload-classes.php');

if (!isset($_SESSION['user'])) {
    header('location: ./login.php');
    exit();
}

$usersView = new UsersView();

$users = $usersView->usersList();

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

        <section class="users-list">
            <?php
            foreach ($users as $user) {
                $status = ($user->login) ? "En ligne" : "Hors ligne";
                $statusLight = ($user->login) ? "enligne" : "horsligne";
            ?>
                <section class="user">
                    <p class="logo-name"><?= strtoupper(substr($user->pseudo, 0, 1)); ?></p>
                    <p class="username"><?= ucfirst($user->pseudo); ?></p>
                    <section class="status-section">
                        <p class="status"><?= $status; ?></p>
                        <div class="status-light <?= $statusLight; ?>"></div>
                    </section>
                </section>
            <?php
            }
            ?>
        </section>

        <section class="messages-section">
            <section class="message-box">

            </section>
            <form class="messages-form">
                <input type="text" name="text" id="text">
                <input type="submit" name="envoye" value="Envoye">
            </form>
        </section>
    </section>
</body>

</html>