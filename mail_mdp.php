<?php
    session_start();

    $a_z = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $mdp = '0'.$a_z[rand(0,51)].rand(0,9).rand(0,9).$a_z[rand(0,51)].rand(0,9).rand(0,9).$a_z[rand(0,51)].rand(0,9);
    $email= $_POST['email'];
    $message= ' voici votre nouveau mot de passe : '.$mdp;

    $action = $_POST['action'];


    $dbHost = 'mysql-bestsithever.alwaysdata.net';
    $dbLogin = '149556_holoadmin';
    $dbPass = 'kyloben';

    $dbBd = 'bestsithever_holocron';
?>

<?php

    if($action == 'mailer')
    {
        $dbLink = mysqli_connect($dbHost, $dbLogin, $dbPass)
        or die('Erreur de connexion dans la base : ' . mysqli_error($dbLink));

        mysqli_select_db($dbLink, $dbBd)
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

        $query = 'SELECT email FROM user WHERE email = ' . '\'' . $email . '\'';

        if (!$dbResult = mysqli_query($dbLink, $query))
        {
            echo 'Erreur de la requête<br/>';
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
                echo 'E-mail non valide. Réessayez. <br/>';
            }
            else
            {
                mail($email, 'Mot de passe oublié', $message);

                $query = 'UPDATE  user SET motdepasse =' . '\'' . md5($mdp) . '\'' . 'WHERE email = ' . '\'' . $email . '\'';

                if (!$dbResult = mysqli_query($dbLink, $query))
                {
                    echo 'Erreur de la requête<br/>';
                    //Type erreur
                    echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                    //Affiche requête envoyée
                    echo 'Requête : ' . $query . '<br/>';
                    exit();
                }
                header('Location: connexion.php');
            }
        }
    }
?>