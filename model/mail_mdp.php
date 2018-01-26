<?php


function mdpChangement($email, $mdp)
{
    $dbLink = db_connect();

    $query = 'UPDATE  user SET motdepasse =' . '\'' . $mdp . '\'' . 'WHERE email = ' . '\'' . $email . '\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . $query . '<br/>';
    }

    else
    {
        return 1;
    }
}
?>