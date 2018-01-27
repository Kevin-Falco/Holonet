<?php

function inscription_verifEmail($email)
{
    $dbLink = db_connect();

    $query = 'SELECT * FROM user WHERE email = ' . '\'' . $email . '\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . $query . '<br/>';
    }

    return $dbRow = mysqli_fetch_assoc($dbResult);
}

function inscription_insert($pseudo, $email, $mdp, $status)
{
    $code = mt_rand(0, 999999999);

    $dbLink = db_connect();

    $query = 'INSERT INTO user (pseudo, email, motdepasse, categorie, code, valider) VALUES (\'' . $pseudo . '\', \'' . $email . '\', \'' . md5($mdp) . '\',\'' . $status . '\', ' . $code . ', ' . 0  . ')';

    if(!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . $query . '<br/>';
    }

    else
    {
        return 1;
    }
}