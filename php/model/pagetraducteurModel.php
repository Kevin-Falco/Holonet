<?php

function traductionTraducteurEnCours()
{
    $dbLink = db_connect();
    $query = 'SELECT * FROM traduction WHERE etat = \'en cours\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    return $dbResult;
}

function traductionTraducteurAcceptee()
{
    $dbLink = db_connect();

    $query = 'SELECT * FROM traduction WHERE etat = \'accepté\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    return $dbResult;
}

function traductionTraducteurRefusee()
{
    $dbLink = db_connect();

    $query = 'SELECT * FROM traduction WHERE etat = \'refusé\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    return $dbResult;
}

function traductionAjoutFrancais($trad)
{
    $dbLink = db_connect();

    $query = 'INSERT INTO traduction (pseudo, fr, en, etat) VALUES (\'N/D\', \'' . $dbLink->real_escape_string ($trad) . '\', \'' . $dbLink->real_escape_string ($trad) . '\', \'accepté\')';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    return 1;
}

function traductionAjoutAnglais($trad, $mot)
{
    $dbLink = db_connect();

    $query = 'INSERT INTO traduction (pseudo, fr, en, etat) VALUES (\'N/D\', \'' . $dbLink->real_escape_string ($trad) . '\', \'' . $dbLink->real_escape_string ($mot) . '\', \'accepté\')';


    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    return 1;
}

function traductionARefuser($id)
{
    $dbLink = db_connect();

    $query = 'UPDATE traduction SET etat = \'refusé\' WHERE id = \'' . $id . '\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

}

function traductionASupprimer($id)
{
    $dbLink = db_connect();

    $query = 'DELETE FROM traduction WHERE id = \'' . $id . '\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

}

function traductionAValiderAnglais($trad, $tradID)
{
    $dbLink = db_connect();

    $query = 'UPDATE traduction SET en = \'' . $dbLink->real_escape_string ($trad) . '\', etat=\'accepté\' WHERE id = \'' . $tradID . '\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }
}

function traductionAValiderFrancais($trad, $tradID)
{
    $dbLink = db_connect();

    $query = 'UPDATE traduction SET fr = \'' . $dbLink->real_escape_string ($trad) . '\', etat=\'accepté\' WHERE id = \'' . $tradID . '\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

}

function traductionAExporter()
{
    $dbLink = db_connect();
    $query = 'SELECT fr, en FROM traduction';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    return $dbResult;

}

?>