<?php

function affichageUtilisateurs()
{
    $dbLink = db_connect();

    $query = 'SELECT email, categorie FROM user WHERE categorie != \'admin\';';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . $query . '<br/>';
    }

    return mysqli_fetch_assoc($dbResult);
}