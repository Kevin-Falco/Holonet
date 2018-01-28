<<<<<<< HEAD:php/model/gestionUtilisateur.php
<?php

function affichageUtilisateurs()
{
    $dbLink = db_connect();

    $query = 'SELECT email, categorie FROM user WHERE categorie != \'admin\';';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    return $dbResult;
=======
<?php

function affichageUtilisateurs()
{
    $dbLink = db_connect();

    $query = 'SELECT email, categorie FROM user WHERE categorie != \'admin\';';

    if (!$dbResult = mysqli_query($dbLink, $query))
    {
        return 'Erreur de la requête<br/>' . 'Erreur : ' . mysqli_error($dbLink) . '<br/>' . 'Requête : ' . htmlspecialchars($query) . '<br/>';
    }

    return $dbResult;
>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf:php/model/gestionUtilisateur.php
}