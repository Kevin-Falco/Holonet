<<<<<<< HEAD:php/model/connexionModel.php
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
=======
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
>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf:php/model/connexionModel.php
