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
            <a href="index.php" class="active">Accueil</a>
            <a href="page1.php">Page 1</a>
            <a href="page2.php">Page 2</a>
            <a href="connexion.php" id="connectButton">Connexion</a>
            <a href="javascript:void(0);" class="icon" onclick="doAResponsiveToolbar()">&#9776;</a>
        </div>
    </nav>
    <div class="container-fluid">
        <p><?= 'Mettre du texte à la place des balises br. PS : le bootstrap c\'est bien et normalement le site est responsive (pour l\'instant)'?></p>
        <div class="row">
            <div class="col-xs-1 col-sm-4"></div>
            <div class="col-xs-10 col-sm-4 used">
                <p>Yo la millefa</p>
            </div>
            <div class="col-xs-1 col-sm-4"></div>
        </div>
        <div>
            <div class="col-xs-12"><br/></div>
        </div>
        <div class="row">
            <div class="col-xs-1 col-sm-6"></div>
            <div class="col-xs-10 col-sm-4 used">
                <p>J'ai pas d'idée</p>
            </div>
            <div class="col-xs-1 col-sm-2"></div>
        </div>
        <div>
            <div class="col-xs-12"><br/></div>
        </div>
        <div class="row">
            <div class="col-xs-1 col-sm-1"></div>
            <div class="col-xs-10 col-sm-4 used">
                <p>Qu'est ce qui est jaune et qui attend ?</p>
            </div>
            <div class="col-xs-1 col-sm-7"></div>
        </div>
        <div>
            <div class="col-xs-12"><br/></div>
        </div>
        <div class="row">
            <div class="col-xs-1 col-sm-5"></div>
            <div class="col-xs-10 col-sm-4 used">
                <p>Jonathan</p>
            </div>
            <div class="col-xs-1 col-sm-3"></div>
        </div>
        <div>
            <div class="col-xs-12"><br/></div>
        </div>
        <div class="row">
            <div class="col-xs-1 col-sm-2"></div>
            <div class="col-xs-10 col-sm-4 used">
                <p>Jaune attend</p>
            </div>
            <div class="col-xs-1 col-sm-6"></div>
        </div>
        <div>
            <div class="col-xs-12"><br/></div>
        </div>
        <div class="row">
            <div class="col-xs-1 col-sm-1"></div>
            <div class="col-xs-4 col-sm-4 used">
                <p>ptdr</p>
            </div>
            <div class="col-xs-2 col-sm-2"></div>
            <div class="col-xs-4 col-sm-4 used">
                <p>lol</p>
            </div>
            <div class="col-xs-1 col-sm-1"></div>
        </div>
        <div>
            <div class="col-xs-12"><br/></div>
        </div>
        <div class="row">
            <div class="col-xs-1 col-sm-6"></div>
            <div class="col-xs-10 col-sm-4 used">
                <p>Trop des barres</p>
            </div>
            <div class="col-xs-1 col-sm-2"></div>
        </div>
    </div>
</body>