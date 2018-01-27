<?php

include 'trad.php';
include 'utils.inc.php';

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


debut_page();
barre_Navigation();

$pseudo = $dbLink->real_escape_string ($_SESSION['pseudo']);

?>
<form action="pagepremium-processing.php" method="post">
    <?= gettext('Détecter la langue d\'un mot :')?> <br>
    <input type="text" name="mot"><?= htmlspecialchars($_SESSION['detect']); $_SESSION['detect'] = ''?><br>
    <input type="submit" name="action" value="Détecter"><br>
</form>

<form action="pagepremium-processing.php" method="post">
    <?= gettext('Mot à demander :')?> <br>
    <input type="text" name="mot"><br>
    <?= gettext('Langue : ')?> <select name="lang" id="">
        <option value="francais"> <?= gettext('Francais')?> </option>
        <option value="anglais"> <?= gettext('Anglais')?> </option>
    </select><br>
    <input type="submit" name="action" value="Demander"><br>
</form>

<?php
if(isset($_SESSION['demande_reussie']))
    echo htmlspecialchars($_SESSION['demande_reussie']); $_SESSION['demande_reussie'] = '';

$query = 'SELECT * FROM traduction WHERE pseudo =\'' . $pseudo . '\' AND
    etat = \'en cours\'';
if(!$dbResult = mysqli_query($dbLink, $query))
{
    echo 'Erreur dela requête<br/>';
    //Type erreur
    echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
    //Affiche requête envoyée
    echo 'Requête : ' . htmlspecialchars($query) . '<br/>';
    exit();
}
echo gettext('Demandes de traductions en cours :') . ' <br> ';
while($dbRow = mysqli_fetch_assoc($dbResult)){
    if(empty($dbRow['fr']))
        echo gettext('Demande de traduction du mot anglais ') . htmlspecialchars($dbRow['en']) . gettext(' en français') . ' <br> ';
    else
        echo gettext('Demande de traduction du mot francais ') . htmlspecialchars($dbRow['fr']) . gettext(' en anglais') . ' <br> ';
}

$query = 'SELECT * FROM traduction WHERE pseudo =\'' . $pseudo . '\' AND
    etat = \'refusé\'';

if(!$dbResult = mysqli_query($dbLink, $query))
{
    echo 'Erreur dela requête<br/>';
    //Type erreur
    echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
    //Affiche requête envoyée
    echo 'Requête : ' . htmlspecialchars($query) . '<br/>';
    exit();
}
echo '<br> <br>' . gettext('Demandes de traductions refusées :') . ' <br> ';
while($dbRow = mysqli_fetch_assoc($dbResult)){
    if(empty($dbRow['fr']))
        echo gettext('Demande de traduction du mot anglais ') . htmlspecialchars($dbRow['en']) . gettext(' en français') . ' <br> ';
    else
        echo ettext('Demande de traduction du mot français ') . htmlspecialchars($dbRow['fr']) . gettext(' en anglais') . ' <br> ';
}


$query = 'SELECT * FROM traduction WHERE pseudo =\'' . $pseudo . '\' AND
    etat = \'accepté\'';

if(!$dbResult = mysqli_query($dbLink, $query))
{
    echo 'Erreur dela requête<br/>';
    //Type erreur
    echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
    //Affiche requête envoyée
    echo 'Requête : ' . htmlspecialchars($query) . '<br/>';
    exit();
}
echo '<br> <br>'. gettext('Demandes de traductions acceptées :') . ' <br> ';
while($dbRow = mysqli_fetch_assoc($dbResult)){
    echo gettext('Le mot anglais ') . htmlspecialchars($dbRow['en']) . gettext(' correspond au mot français ') . htmlspecialchars($dbRow['fr']) . '<br> ';
}


?>










