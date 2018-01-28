<<<<<<< HEAD
<?php
require('trad.php');
require ('utils.inc.php');
require('../model/pagePremiumModel.php');

session_start();

if($_SESSION['categorie'] != 'premium' && $_SESSION['categorie'] != 'traducteur' && $_SESSION['categorie'] != 'admin' ) {
    require('page1Controller.php');
}

if (isset($_SESSION['lang'])) {
    $p = '?lang=' . $_SESSION['lang'];
}

$pseudo = $_SESSION['pseudo'];
$mot = $_POST['mot'];
$action = $_POST['action'];

if($action == 'Demander')
{
    if($_POST['lang'] == 'francais')
    {
        if (demanderTraductionFrancais($pseudo, $mot))
        {
            $_SESSION['demande_reussie'] = 'La requête a bien été envoyée aux traducteurs';
            header("Location: pagePremiumController.php$p");
            exit();
        }
    }
    else
    {
        if(demanderTraductionAnglais($pseudo, $mot))
        {
            $_SESSION['demande_reussie'] = 'La requête a bien été envoyée aux traducteurs';
            header("Location: pagePremiumController.php$p");
            exit();
        }
    }
}
else if($action == 'Détecter')
{
    $dbResult = detecterLangue($mot);

    if(!mysqli_num_rows($dbResult))
        $_SESSION['detect'] = 'Inconnu';

    $dbRow = mysqli_fetch_assoc($dbResult);

    if($_POST['mot'] == $dbRow['fr'] )
        $_SESSION['detect'] =  'français';
    else if($_POST['mot'] == $dbRow['en'] )
        $_SESSION['detect'] =  'anglais';
    header("Location: pagePremiumController.php$p");
    exit();

}
=======
<?php
require('trad.php');
require ('utils.inc.php');
require('../model/pagePremiumModel.php');

session_start();

if($_SESSION['categorie'] != 'premium' && $_SESSION['categorie'] != 'traducteur' && $_SESSION['categorie'] != 'admin' ) {
    require('page1Controller.php');
}

if (isset($_SESSION['lang'])) {
    $p = '?lang=' . $_SESSION['lang'];
}

$pseudo = $_SESSION['pseudo'];
$mot = $_POST['mot'];
$action = $_POST['action'];

if($action == 'Demander')
{
    if($_POST['lang'] == 'francais')
    {
        if (demanderTraductionFrancais($pseudo, $mot))
        {
            $_SESSION['demande_reussie'] = 'La requête a bien été envoyée aux traducteurs';
            header("Location: pagePremiumController.php$p");
            exit();
        }
    }
    else
    {
        if(demanderTraductionAnglais($pseudo, $mot))
        {
            $_SESSION['demande_reussie'] = 'La requête a bien été envoyée aux traducteurs';
            header("Location: pagePremiumController.php$p");
            exit();
        }
    }
}
else if($action == 'Détecter')
{
    $dbResult = detecterLangue($mot);

    if(!mysqli_num_rows($dbResult))
        $_SESSION['detect'] = 'Inconnu';

    $dbRow = mysqli_fetch_assoc($dbResult);

    if($_POST['mot'] == $dbRow['fr'] )
        $_SESSION['detect'] =  'français';
    else if($_POST['mot'] == $dbRow['en'] )
        $_SESSION['detect'] =  'anglais';
    header("Location: pagePremiumController.php$p");
    exit();

}
>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf
