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


            <link rel="icon" type="image/png" href="/Images/Favicon32x32.png" sizes="32x32" />
            <link rel="icon" type="image/png" href="/Images/Favicon64x64.png" sizes="64x64" />

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="/css/style.css">

            <script src="../js/toolbar.js"></script>
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

                //Javascript pour savoir la page, mettre classe Passive/Active
                <a href="index.php"
                <?php if($pageActive == 1) echo'class="active"'; ?>
                echo'>Accueil</a>';

                <a href = "../page1.php"
                <?php if($pageActive == 2)echo 'class=active"'; ?>
                > Page 1 </a >

                <a href = "../page2.php"
                <?php if($pageActive == 3)echo 'class=active"';?>
                > Page 2 </a >

                <?php
                if(isset($_SESSION['email']))
                {
                ?>

                    <a href="connexionViewController.php" id="connectButton"
                    <?php if($pageActive == 4) echo 'class="active"'; ?>
                    >Connexion</a>

                <?php
                }
                else
                {
                ?>
                    <a href="/view/profil.php" id="connectButton"
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

    function db_connect()
    {
        $dbHost = 'mysql-bestsithever.alwaysdata.net';
        $dbLogin = '149556_holoadmin';
        $dbPass = 'kyloben';

        $dbBd = 'bestsithever_holocron';

        $dbLink = mysqli_connect($dbHost, $dbLogin, $dbPass)
        or die('Erreur de connexion dans la base : ' . mysqli_error($dbLink));

        mysqli_select_db($dbLink, $dbBd)
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

        return $dbLink;
    }
?>