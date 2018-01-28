<?php

function connexion($email)
{
    $dbLink = db_connect();

    $query = 'SELECT * FROM user WHERE email = ' . '\'' . $dbLink->real_escape_string ($email) . '\'';

    if(!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . $query . '<br/>';
    }

    return $dbResult;
}
