<?php

/**
 * Récupère les données utilisateur
 * @param String $email
 * @return array|int|null
 */
function getUserDataByEmail($email)
{
    $dbLink = db_connect();

    $query = 'SELECT * FROM user WHERE email = \'' . $email . '\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . $query . '<br/>';
    }

    return mysqli_fetch_assoc($dbResult);

}