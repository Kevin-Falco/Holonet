<?php

/**
 * Modifie le mot de passe d'un utilisateur
 * @param $nouveau_mdp
 * @return int
 */
function modifMdp($email, $nouveau_mdp)
{
    $dbLink = db_connect();

    $query = 'UPDATE user SET motdepasse = \'' . $dbLink->real_escape_string ($nouveau_mdp) . '\'' . ' WHERE email = ' . '\'' . $dbLink->real_escape_string ($email) . '\'';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . $query . '<br/>';
    }
    else
    {
        return 1;
    }
}



