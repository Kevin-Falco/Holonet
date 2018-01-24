<?php

    function connexion($email)
    {
        $dbLink = db_connect();

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
            return $dbResult;
        }
    }
?>
