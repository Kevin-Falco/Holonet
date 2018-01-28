<<<<<<< HEAD
<?php
require('trad.php');
require('utils.inc.php');
require('../model/pagetraducteurModel.php');

session_start();

if($_SESSION['categorie'] != 'traducteur' && $_SESSION['categorie'] != 'admin' ){
    require('page1Controller.php');
}

$request = "";

if(!isset($_SESSION['request'])) {

    $request = '<div class="formulaire">
        <form action="pageTraducteurModelController.php" method="post">' .
        gettext('Mot à ajouter en base de donnée : ') .'<br/>
            <input type="text" name="mot"><br/><br/>

            ' . gettext('Langue : ') . '
            <select name="lang" id="">
                <option value="francais">' . gettext('Francais') . '</option>
                <option value="anglais">' . gettext('Anglais') . '</option>
            </select><br/><br/>
            <input type="text" name="trad"><br/><br/>
            <input type="hidden" name="action" value="Envoyer">
            <input type="submit" value=' . gettext('Envoyer') . '><br/>
        </form>
    </div>';

    unset($_SESSION['request']);
}
else {

    $request = '<div class="formulaire">
        <form action="pageTraducteurModelController.php" method="post">
            ' . gettext('Mot à ajouter en base de donnée :') . '<br/>
            <input type="text" name="mot" value="'. htmlspecialchars($_SESSION['mot1']) . '"><br/><br/>

            '. gettext('Langue : ') . '
            <select name="lang" id="">
                <option value="francais" '. htmlspecialchars(($_SESSION['selected']) == 'fr' ? 'selected' : '' ). '>' . gettext('Francais'). '</option>
                <option value="anglais"'. htmlspecialchars(($_SESSION['selected']) == 'en' ? 'selected' : '' ) . '>'. gettext('Anglais'). '</option>
            </select><br/><br/>
            <input type="text" name="trad"><br/><br/>
            <input type="hidden" name="action" value="Valider">
            <input type="submit" value=" '. gettext('Valider') . '"><br/>
        </form>
    </div>
    <div class="traduction">';

}

$envoie_reussie = "";
if(isset($_SESSION['envoi_reussie']))
{
    $envoie_reussie = htmlspecialchars($_SESSION['envoi_reussie']);
    $_SESSION['envoi_reussie'] = '';
}


$trad_en_attente = "";
$dbResult = traductionTraducteurEnCours();
while($dbRow = mysqli_fetch_assoc($dbResult))
{
    $trad_en_attente .='<form action="pageTraducteurModelController.php" method="post"> ';
    if(empty($dbRow['fr']))
        $trad_en_attente .= gettext('Demande de traduction du mot anglais ') . htmlspecialchars($dbRow['en']) . gettext(' en français  ');
    else
        $trad_en_attente .= gettext('Demande de traduction du mot français ') . htmlspecialchars($dbRow['fr']) . gettext(' en anglais  ');
    $trad_en_attente .= '<input type="submit" name="action" value="Résoudre" >
                    <input type="submit" name="action" value="Refuser">
                    <input type="hidden" name="id" value="' . $dbRow['id']  .'">
                    <input type="hidden" name="fr" value="' . htmlspecialchars($dbRow['fr'])  .'">
                    <input type="hidden" name="en" value="' . htmlspecialchars($dbRow['en'])  .'"></form><br/>';
}

$trad_BD_acceptees = "";
$dbResult = traductionTraducteurAcceptee();

while($dbRow = mysqli_fetch_assoc($dbResult)) {
    $trad_BD_acceptees .= '<form action="pageTraducteurModelController.php" method="post"> ';
    $trad_BD_acceptees .=  gettext('Traduction du mot français ') .htmlspecialchars( $dbRow['fr']) . gettext(' en anglais :  ') . htmlspecialchars($dbRow['en']) . '<br/>';
    $trad_BD_acceptees .=  '  <input type="submit" name="action" value="Changer la traduction fr">
                    <input type="submit" name="action" value="Changer la traduction en">
                    <input type="submit" name="action" value="Supprimer">
                    <input type="hidden" name="id" value="' . htmlspecialchars($dbRow['id']) .'">
                    <input type="hidden" name="fr" value="' . htmlspecialchars($dbRow['fr'])  .'">
                    <input type="hidden" name="en" value="' . htmlspecialchars($dbRow['en'])  .'"></form><br/>';
}

$trad_refusee = "";
$dbResult = traductionTraducteurRefusee();

while($dbRow = mysqli_fetch_assoc($dbResult)) {
    if(empty($dbRow['fr']))
        $trad_refusee .= gettext('Demande de traduction du mot anglais ') . htmlspecialchars($dbRow['en']) . gettext(' en français ') . ' <br> ';
    else
        $trad_refusee .= gettext('Demande de traduction du mot français ') . htmlspecialchars($dbRow['fr']) . gettext(' en anglais ') . ' <br> ';
}

=======
<?php
require('trad.php');
require('utils.inc.php');
require('../model/pagetraducteurModel.php');

session_start();

if($_SESSION['categorie'] != 'traducteur' && $_SESSION['categorie'] != 'admin' ){
    require('page1Controller.php');
}

$request = "";

if(!isset($_SESSION['request'])) {

    $request = '<div class="formulaire">
        <form action="pageTraducteurModelController.php" method="post">' .
        gettext('Mot à ajouter en base de donnée : ') .'<br/>
            <input type="text" name="mot"><br/><br/>

            ' . gettext('Langue : ') . '
            <select name="lang" id="">
                <option value="francais">' . gettext('Francais') . '</option>
                <option value="anglais">' . gettext('Anglais') . '</option>
            </select><br/><br/>
            <input type="text" name="trad"><br/><br/>
            <input type="hidden" name="action" value="Envoyer">
            <input type="submit" value=' . gettext('Envoyer') . '><br/>
        </form>
    </div>';

    unset($_SESSION['request']);
}
else {

    $request = '<div class="formulaire">
        <form action="pageTraducteurModelController.php" method="post">
            ' . gettext('Mot à ajouter en base de donnée :') . '<br/>
            <input type="text" name="mot" value="'. htmlspecialchars($_SESSION['mot1']) . '"><br/><br/>

            '. gettext('Langue : ') . '
            <select name="lang" id="">
                <option value="francais" '. htmlspecialchars(($_SESSION['selected']) == 'fr' ? 'selected' : '' ). '>' . gettext('Francais'). '</option>
                <option value="anglais"'. htmlspecialchars(($_SESSION['selected']) == 'en' ? 'selected' : '' ) . '>'. gettext('Anglais'). '</option>
            </select><br/><br/>
            <input type="text" name="trad"><br/><br/>
            <input type="hidden" name="action" value="Valider">
            <input type="submit" value=" '. gettext('Valider') . '"><br/>
        </form>
    </div>
    <div class="traduction">';

}

$envoie_reussie = "";
if(isset($_SESSION['envoi_reussie']))
{
    $envoie_reussie = htmlspecialchars($_SESSION['envoi_reussie']);
    $_SESSION['envoi_reussie'] = '';
}


$trad_en_attente = "";
$dbResult = traductionTraducteurEnCours();
while($dbRow = mysqli_fetch_assoc($dbResult))
{
    $trad_en_attente .='<form action="pageTraducteurModelController.php" method="post"> ';
    if(empty($dbRow['fr']))
        $trad_en_attente .= gettext('Demande de traduction du mot anglais ') . htmlspecialchars($dbRow['en']) . gettext(' en français  ');
    else
        $trad_en_attente .= gettext('Demande de traduction du mot français ') . htmlspecialchars($dbRow['fr']) . gettext(' en anglais  ');
    $trad_en_attente .= '<input type="submit" name="action" value="Résoudre" >
                    <input type="submit" name="action" value="Refuser">
                    <input type="hidden" name="id" value="' . $dbRow['id']  .'">
                    <input type="hidden" name="fr" value="' . htmlspecialchars($dbRow['fr'])  .'">
                    <input type="hidden" name="en" value="' . htmlspecialchars($dbRow['en'])  .'"></form><br/>';
}

$trad_BD_acceptees = "";
$dbResult = traductionTraducteurAcceptee();

while($dbRow = mysqli_fetch_assoc($dbResult)) {
    $trad_BD_acceptees .= '<form action="pageTraducteurModelController.php" method="post"> ';
    $trad_BD_acceptees .=  gettext('Traduction du mot français ') .htmlspecialchars( $dbRow['fr']) . gettext(' en anglais :  ') . htmlspecialchars($dbRow['en']) . '<br/>';
    $trad_BD_acceptees .=  '  <input type="submit" name="action" value="Changer la traduction fr">
                    <input type="submit" name="action" value="Changer la traduction en">
                    <input type="submit" name="action" value="Supprimer">
                    <input type="hidden" name="id" value="' . htmlspecialchars($dbRow['id']) .'">
                    <input type="hidden" name="fr" value="' . htmlspecialchars($dbRow['fr'])  .'">
                    <input type="hidden" name="en" value="' . htmlspecialchars($dbRow['en'])  .'"></form><br/>';
}

$trad_refusee = "";
$dbResult = traductionTraducteurRefusee();

while($dbRow = mysqli_fetch_assoc($dbResult)) {
    if(empty($dbRow['fr']))
        $trad_refusee .= gettext('Demande de traduction du mot anglais ') . htmlspecialchars($dbRow['en']) . gettext(' en français ') . ' <br> ';
    else
        $trad_refusee .= gettext('Demande de traduction du mot français ') . htmlspecialchars($dbRow['fr']) . gettext(' en anglais ') . ' <br> ';
}

>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf
require('../view/pageTraducteur.php');