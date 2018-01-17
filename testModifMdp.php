<?php
    include 'utils.inc.php';

    session_start();
?>

<?php
    $ancien_mdp= $_POST['mdp'];
    $nouveau_mdp = $_POST['nouveau_mdp'];
    $verif_nouveau_mdp= $_POST['verif_nouveau_mdp'];
    $status= $_POST['status'];

    $action = $_POST['action'];

    $dbHost = 'mysql-bestsithever.alwaysdata.net';
    $dbLogin = '149556_holoadmin';
    $dbPass = 'kyloben';

    $dbBd = 'bestsithever_holocron';
?>

<?php

    if($action == 'Valider')
    {
        $dbLink = mysqli_connect($dbHost, $dbLogin, $dbPass)
        or die('Erreur de connexion dans la base : ' . mysqli_error($dbLink));

        mysqli_select_db($dbLink, $dbBd)
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

        $query = 'SELECT * FROM user WHERE email = ' . '\'' . $email . '\'';

        if(!$dbResult = mysqli_query($dbLink, $query))
        {
            echo 'Erreur dela requête<br/>';
            //Type erreur
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            //Affiche requête envoyée
            echo 'Requête : ' . $query . '<br/>';
            exit();

        }

        if($verif_nouveau_mdp != $nouveau_mdp)
        {
            header('Location: modifMdp.php?step=ERROR');
            exit;
        }

        $query = 'UPDATE user SET motdepasse = '. mdk5($nouveau_mdp) . 'WHERE email = ' . '\'' . $_SESSION['email'] . '\'';

        if(!$dbResult = mysqli_query($dbLink, $query))
        {
            echo 'Erreur dela requête<br/>';
            //Type erreur
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            //Affiche requête envoyée
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
        else
        {
            header('Location: profil.php');
            exit;
        }
    }

?>