<?php
function verificationCode($email)
{
    $dbLink = db_connect();

    $query = 'UPDATE user set valider = 1 WHERE email = \'' . $email . '\'';

    if(!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . $query . '<br/>';
    }
    else
    {
        return 1;
    }
}
?>