<?php


function mdpChangement($email, $mdp)
{
    $dbLink = db_connect();

    $query = 'UPDATE  user SET motdepasse = \'' . $dbLink->real_escape_string ($mdp) . '\'' . 'WHERE email = ' . '\'' . $dbLink->real_escape_string ($email) . '\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    else
    {
        return 1;
    }
}
?>