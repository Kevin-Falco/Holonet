<?php

function inscription_verifEmail($email)
{
    $dbLink = db_connect();

    $query = 'SELECT * FROM user WHERE email = ' . '\'' . $dbLink->real_escape_string ($email) . '\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . $query . '<br/>';
    }

    return mysqli_fetch_assoc($dbResult);
}

function inscription_insert($pseudo, $email, $mdp, $status, $code)
{
    $dbLink = db_connect();

    $query = 'INSERT INTO user (pseudo, email, motdepasse, categorie, code, valider) VALUES (\'' . $dbLink->real_escape_string ($pseudo) . '\', \'' . $dbLink->real_escape_string ($email) . '\', \'' . $dbLink->real_escape_string ($mdp) . '\',\'' .$dbLink->real_escape_string ($status) . '\', ' . $code . ', ' . 0 . ')';

    if(!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . $query . '<br/>';
    }

    return 1;

}

