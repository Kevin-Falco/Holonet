<?php
    include 'utils.inc.php';

    session_start();
    debut_page();
?>

<?php
    $code= $_POST['code'];

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

        $query = 'SELECT code FROM user WHERE pseudo = ' . '\'' . $_SESSION['pseudo'] . '\'';

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
            if($dbRow = mysqli_fetch_assoc($dbResult))
            {
                if ($code == $dbRow['code'])
                {
                    $_SESSION['login'] = 'ok';
                    fin_page();
                    header('Location: index.php');
                }
                else
                {
                    fin_page();
                    header('Location: validationInscription.php?step=ERROR');
                }
            }
        }
    }

    fin_page();
?>