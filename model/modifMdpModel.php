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
        return 0;
    }
    else
    {
        return mysqli_fetch_assoc($dbResult);
    }
}

/**
 * Modifie le mot de passe d'un utilisateur
 * @param $nouveau_mdp
 * @return int
 */
function modifMdp($email, $nouveau_mdp)
{
    $dbLink = db_connect();

    $query = 'UPDATE user SET motdepasse = ' . '\'' . $nouveau_mdp . '\'' . ' WHERE email = ' . '\'' . $email . '\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        echo 'Erreur dela requête<br/>';
        //Type erreur
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        //Affiche requête envoyée
        echo 'Requête : ' . $query . '<br/>';
        exit();
    }
    else
    {
        return 1;
    }
}

