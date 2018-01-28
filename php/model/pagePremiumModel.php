<?php

function traductionPremiumEnCours($pseudo)
{
    $dbLink = db_connect();

    $query = 'SELECT * FROM traduction WHERE pseudo =\'' . $dbLink->real_escape_string ($pseudo) . '\' AND etat = \'en cours\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    return $dbResult;

}
function traductionPremiumrefuse($pseudo)
{
    $dbLink = db_connect();

    $query = 'SELECT * FROM traduction WHERE pseudo =\'' . $dbLink->real_escape_string ($pseudo) . '\' AND etat = \'refusé\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    return $dbResult;
}

function traductionPremiumAcceptee($pseudo)
{
    $dbLink = db_connect();

    $query = 'SELECT * FROM traduction WHERE pseudo =\'' . $dbLink->real_escape_string ($pseudo) . '\' AND etat = \'accepté\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    return $dbResult;
}


function demanderTraductionFrancais($pseudo, $mot)
{
    $dbLink = db_connect();

    $query = 'INSERT INTO traduction (pseudo, fr, etat) VALUES (\'' . $dbLink->real_escape_string ($pseudo) .'\', \'' . $dbLink->real_escape_string ($mot) .'\', \'en cours\')';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    return 1;
}

function demanderTraductionAnglais($pseudo, $mot)
{
    $dbLink = db_connect();

    $query = 'INSERT INTO traduction (pseudo, en, etat) VALUES (\'' . $dbLink->real_escape_string ($pseudo) .'\', \'' . $dbLink->real_escape_string ($mot) .'\', \'en cours\')';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    return 1;

}

function detecterLangue($mot)
{
    $dbLink = db_connect();

    $query = 'SELECT * FROM traduction WHERE en =\'' . $dbLink->real_escape_string ($mot) . '\' OR fr=\'' . $dbLink->real_escape_string ($mot) . '\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    return $dbResult;
}