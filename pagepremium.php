<?php
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

?>
<form action="pagepremium-processing.php" method="post">
    Détecter la langue d'un mot : <br>
    <input type="text" name="mot"><?php echo $_SESSION['detect']; $_SESSION['detect'] = ''?><br>
    <input type="submit" name="action" value="Détecter"><br>
</form>

<form action="pagepremium-processing.php" method="post">
    Mot à demander : <br>
    <input type="text" name="mot"><br>
    Langue : <select name="lang" id="">
        <option value="francais"> Francais </option>
        <option value="anglais"> Anglais </option>
    </select><br>
    <input type="submit" name="action" value="Demander"><br>
</form>

<?php
if(isset($_SESSION['demande_reussie']))
    echo $_SESSION['demande_reussie']; $_SESSION['demande_reussie'] = '';

$query = 'SELECT * FROM traduction WHERE pseudo =\'' . $_SESSION['pseudo'] . '\' AND
    etat = \'en cours\'';
if(!$dbResult = mysqli_query($dbLink, $query))
{
    echo 'Erreur dela requête<br/>';
    //Type erreur
    echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
    //Affiche requête envoyée
    echo 'Requête : ' . $query . '<br/>';
    exit();
}
echo 'Demandes de traductions en cours : <br> ';
while($dbRow = mysqli_fetch_assoc($dbResult)){
    if(empty($dbRow['fr']))
        echo 'Demande de traduction du mot anglais ' . $dbRow['en'] . ' en français <br> ';
    else
        echo 'Demande de traduction du mot français ' . $dbRow['fr'] . ' en anglais <br> ';
}

$query = 'SELECT * FROM traduction WHERE pseudo =\'' . $_SESSION['pseudo'] . '\' AND
    etat = \'refusé\'';

if(!$dbResult = mysqli_query($dbLink, $query))
{
    echo 'Erreur dela requête<br/>';
    //Type erreur
    echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
    //Affiche requête envoyée
    echo 'Requête : ' . $query . '<br/>';
    exit();
}
echo '<br> <br>Demandes de traductions refusées : <br> ';
while($dbRow = mysqli_fetch_assoc($dbResult)){
    if(empty($dbRow['fr']))
        echo 'Demande de traduction du mot anglais ' . $dbRow['en'] . ' en français <br> ';
    else
        echo 'Demande de traduction du mot français ' . $dbRow['fr'] . ' en anglais <br> ';
}


$query = 'SELECT * FROM traduction WHERE pseudo =\'' . $_SESSION['pseudo'] . '\' AND
    etat = \'accepté\'';

if(!$dbResult = mysqli_query($dbLink, $query))
{
    echo 'Erreur dela requête<br/>';
    //Type erreur
    echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
    //Affiche requête envoyée
    echo 'Requête : ' . $query . '<br/>';
    exit();
}
echo '<br> <br>Demandes de traductions acceptées : <br> ';
while($dbRow = mysqli_fetch_assoc($dbResult)){
    echo 'Le mot anglais ' . $dbRow['en'] . ' correspond au mot français ' . $dbRow['fr'] . '<br> ';
}






?>










