<<<<<<< HEAD:php/model/gestionAdmin.php
<?php

function gestionAdminiSupprimer($email)
{
    $dbLink = db_connect();

    $query = 'DELETE FROM user WHERE email = \'' . $dbLink->real_escape_string ($email) . '\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    return 1;
}

function gestionAdminAutre($email, $action)
{
    $dbLink = db_connect();

    $query = 'UPDATE user SET categorie = \'' . strtolower($dbLink->real_escape_string ($action)) . '\' WHERE email = \'' . $dbLink->real_escape_string ($email) . '\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    return 1;
=======
<?php

function gestionAdminiSupprimer($email)
{
    $dbLink = db_connect();

    $query = 'DELETE FROM user WHERE email = \'' . $dbLink->real_escape_string ($email) . '\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    return 1;
}

function gestionAdminAutre($email, $action)
{
    $dbLink = db_connect();

    $query = 'UPDATE user SET categorie = \'' . strtolower($dbLink->real_escape_string ($action)) . '\' WHERE email = \'' . $dbLink->real_escape_string ($email) . '\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    return 1;
>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf:php/model/gestionAdmin.php
}