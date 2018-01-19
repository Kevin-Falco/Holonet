<?php
    include 'utils.inc.php';

    session_start();

    $action = $_POST['action'];

    if($action == 'Valider')
    {
        $code= $_POST['code'];

        $dbHost = 'mysql-bestsithever.alwaysdata.net';
        $dbLogin = '149556_holoadmin';
        $dbPass = 'kyloben';

        $dbBd = 'bestsithever_holocron';

        $dbLink = mysqli_connect($dbHost, $dbLogin, $dbPass)
        or die('Erreur de connexion dans la base : ' . mysqli_error($dbLink));

        mysqli_select_db($dbLink, $dbBd)
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

        $query = 'SELECT * FROM user WHERE email = ' . '\'' . $_SESSION['email'] . '\'';

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
                    $query = 'UPDATE user set valider = 1 WHERE email = ' . '\'' . $_SESSION['email'] . '\'';

                    if(!$dbResult = mysqli_query($dbLink, $query))
                    {
                        echo 'Erreur dela requête<br/>';
                        //Type erreur
                        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                        //Affiche requête envoyée
                        echo 'Requête : ' . $query . '<br/>';
                        exit();

                    }

                    header('Location: verifCodeOk.php');
                    exit;
                }
                else
                {
                    header('Location: validationInscription.php?step=ERROR');
                    exit;
                }
            }
        }
    }

?>