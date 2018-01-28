<<<<<<< HEAD:php/model/verificationCode.php
<?php
function validerUtilisateur($email)
{
    $dbLink = db_connect();

    $query = 'UPDATE user set valider = 1 WHERE email = \'' . $dbLink->real_escape_string ($email) . '\'';

    if(!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . $query . '<br/>';
    }
    else
    {
        return 1;
    }
}
=======
<?php
function validerUtilisateur($email)
{
    $dbLink = db_connect();

    $query = 'UPDATE user set valider = 1 WHERE email = \'' . $dbLink->real_escape_string ($email) . '\'';

    if(!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . $query . '<br/>';
    }
    else
    {
        return 1;
    }
}
>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf:php/model/verificationCode.php
?>