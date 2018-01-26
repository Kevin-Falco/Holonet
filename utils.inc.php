<?php

session_start();
function debut_page()
{
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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/toolbar.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<?php
}

function fin_page()
{
    echo '</body>';
}

function barre_Navigation($pageActive = 0)
{
    ?>
    <nav>
        <div class="navbar" id="myNavbar">
            <?php
            $_SESSION['lang'] = $_GET['lang'];
            $p = $_SESSION['lang']; ?>
            //Javascript pour savoir la page, mettre classe Passive/Active
            <?php echo '<a href = "index.php'; if (isset($_SESSION['lang'])){echo '?lang=' . $p;} echo '"';?>
            <?php if($pageActive == 1) echo'class="active"'; ?>
            echo'> <?php echo gettext('Accueil'); ?> </a>';

            <?php echo '<a href = "page1.php'; if (isset($_SESSION['lang'])){echo '?lang=' . $p;} echo '"';?>
            <?php if($pageActive == 2)echo 'class=active"'; ?>
            > Page 1 </a >

            <?php echo '<a href = "page2.php'; if (isset($_SESSION['lang'])){echo '?lang=' . $p;} echo '"';?>
            <?php if($pageActive == 3)echo 'class=active"';?>
            > Page 2 </a >

            <?php
            $langues = array('Translate to english','Traduire en français');
            $cpt = 0;
            foreach($_POST['locales'] as $l) {
                print "[<a href=\"?lang=$l\">" . $langues[$cpt++] . "</a>] ";
            }

            print "</p>\n"; ?>

            <?php
            if($_SESSION['email'] == null)
            {
                ?>

                <?php echo '<a href="connexion.php'; if (isset($_SESSION['lang'])){echo '?lang=' . $p;} echo '" id="connectButton"'; ?>

                    <?php if($pageActive == 4) echo 'class="active"'; ?>
                > <?php echo gettext('Connexion') ?> </a>

                <?php
            }
            else
            {
                ?>
                <?php echo '<a href="profil.php'; if (isset($_SESSION['lang'])){echo '?lang=' . $p;} echo '" id="connectButton"'; ?>
                    <?php if($pageActive == 4) echo 'class="active"' ?>
                >Profil</a>
                <?php
            }

            ?>


            <a href="javascript:void(0);" class="icon" onclick="doAResponsiveToolbar()">&#9776;</a>
        </div>
    </nav>

    <?php
}
?>
