<?php
/**
 * Created by PhpStorm.
 * User: theo
 * Date: 24/01/2018
 * Time: 14:53
 */
    session_start();

    $action = $_POST['Traduire'];

    if($action == 'Traduire')
    {
        $mot= $_POST['mot'];
        $langue= $_POST['lang'];

        $dbHost = 'mysql-bestsithever.alwaysdata.net';
        $dbLogin = '149556_holoadmin';
        $dbPass = 'kyloben';

        $dbBd = 'bestsithever_holocron';

        $dbLink = mysqli_connect($dbHost, $dbLogin, $dbPass)
        or die('Erreur de connexion dans la base : ' . mysqli_error($dbLink));

        mysqli_select_db($dbLink, $dbBd)
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

        if ($langue == 'francais') {$query = 'SELECT * FROM user WHERE fr = ' . '\'' . $mot . '\'';}
        else {$query = 'SELECT * FROM user WHERE en = ' . '\'' . $mot . '\'';}

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
            if (mysqli_num_rows($dbResult) == 0)
            {
                header('Location: connexion.php?step=ERROR_EMAIL');
                exit;
            }

            if($dbRow = mysqli_fetch_assoc($dbResult))
            {
                if ($langue == 'francais')
                {
                    echo ($mot.' signifie '.$dbRow['fr']);
                }
                else
                {
                    echo ($mot.' signifie '.$dbRow['en']);
                    exit;
                }
            }
        }
    }

?>
