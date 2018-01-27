<?php
session_start();
if($_SESSION['categorie'] != 'premium' && $_SESSION['categorie'] != 'traducteur' && $_SESSION['categorie'] != 'admin' ){
    header('Location: page1.php');
    exit();
}



$dbHost = 'mysql-bestsithever.alwaysdata.net';
$dbLogin = '149556_holoadmin';
$dbPass = 'kyloben';

$dbBd = 'bestsithever_holocron';

$dbLink = mysqli_connect($dbHost, $dbLogin, $dbPass)
or die('Erreur de connexion dans la base : ' . mysqli_error($dbLink));

mysqli_select_db($dbLink, $dbBd)
or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

$pseudo = $dbLink->real_escape_string ($_SESSION['pseudo']);
$mot = $dbLink->real_escape_string ($_POST['mot']);

if($_POST['action'] == 'Demander'){
    if($_POST['lang'] == 'francais'){
        $query = 'INSERT INTO traduction (pseudo, fr, etat) 
        VALUES (\'' . $pseudo .'\', \'' . $mot .'\', \'en cours\')';
    }
    else {
        $query = 'INSERT INTO traduction (pseudo, en, etat) 
        VALUES (\'' . $pseudo .'\', \'' . $mot .'\', \'en cours\')';
    }
    if(!$dbResult = mysqli_query($dbLink, $query))
    {
        echo 'Erreur dela requête<br/>';
        //Type erreur
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        //Affiche requête envoyée
        echo 'Requête : ' . htmlspecialchars($query) . '<br/>';
        exit();

    }
    $_SESSION['demande_reussie'] = 'La requête a bien été envoyée aux traducteurs<br>';
    header('Location: pagepremium.php');
    exit();

}
else if($_POST['action'] == 'Détecter'){
    $query = 'SELECT * FROM traduction WHERE en =\'' . $mot .
        '\' OR fr=\'' . $mot . '\'';
    if(!$dbResult = mysqli_query($dbLink, $query))
    {
        echo 'Erreur dela requête<br/>';
        //Type erreur
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        //Affiche requête envoyée
        echo 'Requête : ' . htmlspecialchars($query) . '<br/>';
        exit();

    }
    if(!mysqli_num_rows($dbResult))
        $_SESSION['detect'] = 'Inconnu';
    $dbRow = mysqli_fetch_assoc($dbResult);
    if($_POST['mot'] == $dbRow['fr'] )
        $_SESSION['detect'] =  'français';
    else if($_POST['mot'] == $dbRow['en'] )
        $_SESSION['detect'] =  'anglais';
    header('Location: pagepremium.php');
    exit();
}
