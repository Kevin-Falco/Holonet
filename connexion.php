<?php
    include 'utils.inc.php';

    debut_page();
?>

<header>
    <!-- Vide -->
</header>
<nav>
    <div class="navbar" id="myNavbar">
        <a href="index.php">Accueil</a>
        <a href="page1.php">Page 1</a>
        <a href="page2.php">Page 2</a>
        <a href="connexion.php" id="connectButton" class="active">Connexion</a>
        <a href="javascript:void(0);" class="icon" onclick="doAResponsiveToolbar()">&#9776;</a>
    </div>
</nav>
<div class="article">
    <?= 'Ici la connexion magique';?>
</div>

<?php
    fin_page()
?>