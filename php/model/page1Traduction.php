<?php

function traductionFrançais ($mot) {

    $dbLink = db_connect();

    $query = 'SELECT * FROM traduction WHERE fr =\'' . $dbLink->real_escape_string ($mot) . '\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    return $dbResult;
}

function traductionAnglais($mot)
{
    $dbLink = db_connect();

    $query = 'SELECT * FROM traduction WHERE en =\'' . $dbLink->real_escape_string ($mot) . '\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    return $dbResult;
}
?>