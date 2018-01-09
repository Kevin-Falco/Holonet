<?php
    include 'utils.inc.php';

    session_start();
    debut_page();
?>

<?php
    $pseudo= $_POST['pseudo'];
    $mdp= $_POST['mdp'];


    $action = $_POST['action'];


    $dbHost = 'mysql-bestsithever.alwaysdata.net';
    $dbLogin = '149556_holoadmin';
    $dbPass = 'kyloben';

    $dbBd = 'bestsithever_holocron';

?>

<?php

    if($action == 'connexion')
    {
        $dbLink = mysqli_connect($dbHost, $dbLogin, $dbPass)
        or die('Erreur de connexion dans la base : ' . mysqli_error($dbLink));

        mysqli_select_db($dbLink, $dbBd)
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

        $query = 'SELECT motdepasse FROM user WHERE pseudo = ' . '\'' . $pseudo . '\'';

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
                if ($mdp == $dbRow['motdepasse'])
                {
                    if($dbRow['valider'])
                    {
                        $_SESSION['login'] = 'ok';
                        $_SESSION['pseudo'] = $pseudo;
                        $_SESSION['mdp'] = $mdp;
                        fin_page();
                        header('Location: index.php');
                    }
                    else
                    {
                        echo '<label>Adresse mail non validée.</label>';
                    }
                }
                else
                {
                    fin_page();
                    header('Location: connexion.php?step=ERROR');
                }
            }


        }
    }

    fin_page();
?>