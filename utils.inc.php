<!-- Cette page a été traitée -->
<?php
    session_start();
    function debut_page() {
?>
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

        <link rel="icon" type="image/png" href="/img/Favicon32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="/img/Favicon64x64.png" sizes="64x64" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">

        <script src="js/toolbar.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
<?php
}

function fin_page() {
    echo '</body>';
}

function barre_Navigation($pageActive = 0) {
?>
    <nav>
        <div class="navbar" id="myNavbar">
            <?php
                if (isset($_GET['lang'])) $_SESSION['lang'] = $_GET['lang'];
                else $_SESSION['lang'] = '';
                $p = $_SESSION['lang'];

                //  Onglet Accueil
                echo '<a href = "index.php';
                if (isset($_SESSION['lang'])) {
                    echo '?lang=' . $p;
                }
                echo '"';
                if ($pageActive == 1) echo 'class="active"';
                echo '>' . gettext('Accueil') . '</a>';

                // Onglet Page 1
                echo '<a href = "page1.php';
                if (isset($_SESSION['lang'])) {
                    echo '?lang=' . $p;
                }
                echo '"';
                if ($pageActive == 2) echo 'class="active"';
                echo '> Page 1 </a >';

                // Onglet Page 2
                echo '<a href = "page2.php';
                if (isset($_SESSION['lang'])) {
                    echo '?lang=' . $p;
                }
                echo '"';
                if ($pageActive == 3) echo 'class="active"';
                echo '> Page 2 </a >';

                // La raison de ce qui suit n'est pas définie et ne le sera jamais. Merci de votre compréhension.
                $langues = array('Translate to english','Traduire en français');
                $cpt = 0;
                foreach($_POST['locales'] as $l) {
                    print "[<a href=\"?lang=$l\">" . $langues[$cpt++] . "</a>] ";
                }

                // Onglet Connexion
                if(!isset($_SESSION['email'])) {
                    echo '<a href="connexion.php';
                    if (isset($_SESSION['lang'])) {
                        echo '?lang=' . $p;
                    }
                    echo '" id="connectButton"';
                    if($pageActive == 4) echo 'class="active"';
                    echo '>' . gettext('Connexion') . '</a>';
                }
                else {
                    echo '<a href="profil.php';
                    if (isset($_SESSION['lang'])) {
                        echo '?lang=' . $p;
                    }
                    echo '" id="connectButton"';
                    if($pageActive == 4) echo 'class="active"';
                    echo '> Profil </a>';
                }
            echo '<a href="javascript:void(0);" class="icon" onclick="doAResponsiveToolbar()">&#9776;</a>
        </div>
    </nav>';
}
?>
