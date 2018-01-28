<<<<<<< HEAD:php/model/functions.php
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

=======
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

>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf:php/model/functions.php
}