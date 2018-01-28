<?php
require('trad.php');
require('utils.inc.php');

session_start();

if (isset($_SESSION['lang'])) {
    $p = '?lang=' . $_SESSION['lang'];
}

if (isset($_SESSION['categorie']) && ($_SESSION['categorie'] == 'premium' || $_SESSION['categorie'] == 'traducteur' || $_SESSION['categorie'] == 'admin' )) {
    $lien_premium = '<a href="pagePremiumController.php'.$p.'" >' . gettext('Page Premium'). '</a>';
    if($_SESSION['categorie'] == 'traducteur' || $_SESSION['categorie'] == 'admin')
        $lien_traducteur = '<a href="pageTraducteurController.php'.$p.'" >' . gettext('Page Traducteur'). '</a><br/>';
}
else
{
    $lien_premium = "";
    $lien_traducteur = "";
}

if(isset($_SESSION['trad_sentence']))
{
    $trad_sentence =  $_SESSION['trad_sentence'];
    $_SESSION['trad_sentence'] = '';
}
    else
        $trad_sentence = "";

if(isset($_SESSION['non_connecté'])) {
    $non_connecte = $_SESSION['non_connecté'];
    $_SESSION['non_connecté'] = '';
}
    else
        $non_connecte = "";


require('../view/page1.php');