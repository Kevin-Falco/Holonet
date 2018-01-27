<?php
/**
 * Created by PhpStorm.
 * User: theo
 * Date: 24/01/2018
 * Time: 14:53
 */
    session_start();

    $action = $_POST['action'];

    if($action == 'Traduire')
    {
        if(isset($_COOKIE['tempotrad'])){
            $_SESSION['non_connecté'] = 'Vous n\'etes pas connectés, 
            vous êtes limité à une traduction toutes les 10 minutes';
            header('Location: page1.php');
            exit();
        }
        if(!isset($_SESSION['categorie']))
            setcookie('tempotrad', '10 minutes', time() + 60*10);
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

        if ($langue == 'francais') {$query = 'SELECT * FROM traduction WHERE fr =\'' . $mot . '\'';}
        else {$query = 'SELECT * FROM traduction WHERE en =\'' . $mot . '\'';}

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
                $_SESSION['trad_sentence'] = 'Le mot demandé n\'a pas encore été traduit.';
                header('Location: page1.php');
                exit();
            }

            if($dbRow = mysqli_fetch_assoc($dbResult))
            {
                if ($langue == 'francais')
                {
                    $_SESSION['trad_sentence'] = ' Le mot français ' . $mot . ' signifie '
                        . $dbRow['en'] . ' en anglais.';

                    header('Location: page1.php');
                    exit();
                }
                else
                {
                    $_SESSION['trad_sentence'] = ' Le mot anglais ' . $mot . ' signifie '
                        . $dbRow['fr'] . ' en français.';
                    header('Location: page1.php');
                    exit();
                }
            }
        }
    }

?>
