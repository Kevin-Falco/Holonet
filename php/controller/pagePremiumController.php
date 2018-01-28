<<<<<<< HEAD
<?php
require('trad.php');
require('utils.inc.php');
require('../model/pagePremiumModel.php');
session_start();

if($_SESSION['categorie'] != 'premium' && $_SESSION['categorie'] != 'traducteur' && $_SESSION['categorie'] != 'admin' ){
    require('page1Controller.php');
}

$pseudo = $_SESSION['pseudo'];

if(isset($_SESSION['detect']))
{
    $detect = $_SESSION['detect'];
    $_SESSION['detect'] = '';
}
else
{
    $detect = "";
}

$demande_reussie = "";

if(isset($_SESSION['demande_reussie']))
{
    $demande_reussie = htmlspecialchars($_SESSION['demande_reussie']);
    $_SESSION['demande_reussie'] = '';
}


$demande_en_cours = "";

$dbResult = traductionPremiumEnCours($pseudo);

while($dbRow = mysqli_fetch_assoc($dbResult))
{
    if(empty($dbRow['fr']))
        $demande_en_cours .= gettext('Demande de traduction du mot anglais ') . htmlspecialchars($dbRow['en']) . gettext(' en français') . ' <br/> ';
    else
        $demande_en_cours .= gettext('Demande de traduction du mot francais ') . htmlspecialchars($dbRow['fr']) . gettext(' en anglais') . ' <br/> ';
}

$demande_refusee = "";
$dbResult = traductionPremiumrefuse($pseudo);

while($dbRow = mysqli_fetch_assoc($dbResult))
{
    if(empty($dbRow['fr']))
        $demande_refusee .= gettext('Demande de traduction du mot anglais ') . htmlspecialchars($dbRow['en']) . gettext(' en français') . ' <br/> ';
    else
        $demande_refusee .= gettext('Demande de traduction du mot français ') . htmlspecialchars($dbRow['fr']) . gettext(' en anglais') . ' <br/> ';
}

$demande_acceptee = "";
$dbResult = traductionPremiumAcceptee($pseudo);

while($dbRow = mysqli_fetch_assoc($dbResult)){
    $demande_acceptee .= gettext('Le mot anglais ') . htmlspecialchars($dbRow['en']) . gettext(' correspond au mot français ') . htmlspecialchars($dbRow['fr']) . '<br/>';
}

require('../view/pagePremium.php');
=======
<?php
require('trad.php');
require('utils.inc.php');
require('../model/pagePremiumModel.php');
session_start();

if($_SESSION['categorie'] != 'premium' && $_SESSION['categorie'] != 'traducteur' && $_SESSION['categorie'] != 'admin' ){
    require('page1Controller.php');
}

$pseudo = $_SESSION['pseudo'];

if(isset($_SESSION['detect']))
{
    $detect = $_SESSION['detect'];
    $_SESSION['detect'] = '';
}
else
{
    $detect = "";
}

$demande_reussie = "";

if(isset($_SESSION['demande_reussie']))
{
    $demande_reussie = htmlspecialchars($_SESSION['demande_reussie']);
    $_SESSION['demande_reussie'] = '';
}


$demande_en_cours = "";

$dbResult = traductionPremiumEnCours($pseudo);

while($dbRow = mysqli_fetch_assoc($dbResult))
{
    if(empty($dbRow['fr']))
        $demande_en_cours .= gettext('Demande de traduction du mot anglais ') . htmlspecialchars($dbRow['en']) . gettext(' en français') . ' <br/> ';
    else
        $demande_en_cours .= gettext('Demande de traduction du mot francais ') . htmlspecialchars($dbRow['fr']) . gettext(' en anglais') . ' <br/> ';
}

$demande_refusee = "";
$dbResult = traductionPremiumrefuse($pseudo);

while($dbRow = mysqli_fetch_assoc($dbResult))
{
    if(empty($dbRow['fr']))
        $demande_refusee .= gettext('Demande de traduction du mot anglais ') . htmlspecialchars($dbRow['en']) . gettext(' en français') . ' <br/> ';
    else
        $demande_refusee .= gettext('Demande de traduction du mot français ') . htmlspecialchars($dbRow['fr']) . gettext(' en anglais') . ' <br/> ';
}

$demande_acceptee = "";
$dbResult = traductionPremiumAcceptee($pseudo);

while($dbRow = mysqli_fetch_assoc($dbResult)){
    $demande_acceptee .= gettext('Le mot anglais ') . htmlspecialchars($dbRow['en']) . gettext(' correspond au mot français ') . htmlspecialchars($dbRow['fr']) . '<br/>';
}

require('../view/pagePremium.php');
>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf
