<<<<<<< HEAD
<?php


function mdpChangement($email, $mdp)
{
    $dbLink = db_connect();

    $query = 'UPDATE  user SET motdepasse = \'' . $dbLink->real_escape_string ($mdp) . '\'' . 'WHERE email = ' . '\'' . $dbLink->real_escape_string ($email) . '\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    else
    {
        return 1;
    }
}
=======
<?php


function mdpChangement($email, $mdp)
{
    $dbLink = db_connect();

    $query = 'UPDATE  user SET motdepasse = \'' . $dbLink->real_escape_string ($mdp) . '\'' . 'WHERE email = ' . '\'' . $dbLink->real_escape_string ($email) . '\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    else
    {
        return 1;
    }
}
>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf
?>