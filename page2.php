<!DOCTYPE html>
<html lang="fr">
<head>
    <title>
        Best Sith Ever
    </title>
    <meta charset="utf-8">
    <meta name="description" content="Projet PHP de 2e année réalisée par l\'équipe constituée d'Anthony, Théo, Léo, Hugo et Kévin">
    <meta name="keywords" content="iut, amu, php, 2e année, projet, info">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/toolbar.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<header>
    <!-- Vide -->
</header>
<nav>
    <div class="navbar" id="myNavbar">
        <a href="index.php">Accueil</a>
        <a href="page1.php">Page 1</a>
        <a href="page2.php"  class="active">Page 2</a>
        <a href="connexion.php" id="connectButton">Connexion</a>
        <a href="javascript:void(0);" class="icon" onclick="doAResponsiveToolbar()">&#9776;</a>
    </div>
</nav>
<div class="article">
    <?= 'La page 2 où on rigole ienb';?>
</div>
</body>