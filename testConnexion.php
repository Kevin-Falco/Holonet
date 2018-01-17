<?php
    session_start();

    $email= $_POST['email'];
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
        else
        {
            if($dbRow = mysqli_fetch_assoc($dbResult))
            {
                if (md5($mdp) == $dbRow['motdepasse'])
                {
                    $_SESSION['pseudo'] = $dbRow['pseudo'];
                    $_SESSION['email'] = $email;
                    $_SESSION['mdp'] = md5($mdp);
                    $_SESSION['categorie'] = $dbRow['categorie'];

                    if($dbRow['valider'])
                    {
                        header('Location: index.php');
                        exit;
                    }
                    else
                    {
                        header('Location: validationInscription.php');
                        exit;
                    }
                }
                else
                {
                    header('Location: connexion.php?step=ERROR');
                    exit;
                }
            }
        }
    }

?>
