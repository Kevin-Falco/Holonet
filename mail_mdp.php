<?php
    session_start();

    $action = $_POST['action'];

    if($action == 'mailer')
    {
        $a_z = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $mdp = '0' . $a_z[mt_rand(0,51)] . mt_rand(0,9) . mt_rand(0,9) . $a_z[mt_rand(0,51)] . mt_rand(0,9) . mt_rand(0,9) . $a_z[mt_rand(0,51)] . mt_rand(0,9);
        $email= $_POST['email'];


        $dbHost = 'mysql-bestsithever.alwaysdata.net';
        $dbLogin = '149556_holoadmin';
        $dbPass = 'kyloben';

        $dbBd = 'bestsithever_holocron';

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
                header('Location: ../pages/mdp_oublie.php?step=ERROR_EMAIL');
                exit;
            }
            else
            {
                $message= 'Voici votre nouveau mot de passe : '. $mdp;
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
                header('Location: ../pages/connexion.php');
            }
        }
    }
?>