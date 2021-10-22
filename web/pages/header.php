<?php

$urlLinkTable = explode('/', $_SERVER['REQUEST_URI']);
$lastIndex = count($urlLinkTable) - 1;
$currentPage = $urlLinkTable[$lastIndex];

?>

<header>
    <div class="logo-section">
        <img src="../css/images/logo.svg" alt="Logo">
        <h1>
            <a href="./accueil.php">AnyCar</a>
        </h1>
    </div>

    <ul class="menu">
        <li class="item"><a href="./accueil.php" class="link">Accueil</a></li>
        <li class="item"><a href="./voitures.php" class="link">Voitures</a></li>
        <li class="item"><a href="./locations.php" class="link">Locations</a></li>
        <li class="item"><a href="./recherches.php" class="link">Recherches</a></li>
        <li class="item"><a href="./loisirs.php" class="link">Loisirs</a></li>
        <li class="item"><a href="./chat.php" class="link">Chat</a></li>
    </ul>

    <?php
    if ($currentPage === 'chat.php') {
    ?>
        <form action="../../src/servers/logout.php" method="POST">
            <input type="submit" name="logout" value="Deconnexion">
        </form>
    <?php
    }
    ?>
</header>