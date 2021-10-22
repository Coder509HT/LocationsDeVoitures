<?php
session_start();
if (isset($_SESSION['response'])) {
    $response = $_SESSION['response'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer Un Compte | AnyCar</title>
    <link type="text/css" rel="stylesheet" href="../css/form.css">
</head>

<body>

    <?php require_once('./header.php'); ?>

    <div class="form-section">

        <h1>Créer Un Compte</h1>

        <form class="form-signup" action="../../src/servers/signup.php" method="POST">
            <div class="input-div">
                <label for="username">Pseudo</label>
                <input required type="text" name="username" id="username" placeholder="Veuillez choisir un pseudo">
            </div>

            <div class="input-div">
                <label for="password">Mot De Passe</label>
                <input required type="password" name="password" id="password" placeholder="Veuillez choisir un mot de passe">
            </div>

            <div class="input-div">
                <label for="passwordConfirmation">Confirmation Mot De Passe</label>
                <input required type="password" name="passwordConfirmation" id="passwordConfirmation" placeholder="Veuillez confirmer votre mot de passe">
            </div>

            <?php
            if (isset($response)) {
            ?>
                <div class="input-div">
                    <p class="response-msg <?= $response->status; ?>">
                        <?= $response->message; ?>
                    </p>
                </div>
            <?php
            }

            unset($_SESSION['response']);
            session_destroy();
            ?>


            <input type="submit" name="signup" value="Créer Un Compte">

            <a href="./login.php">&RightArrow; Connecter À Votre Compte</a>
        </form>
    </div>
</body>

</html>