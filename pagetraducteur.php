<?php
include 'trad.php';
include 'utils.inc.php';
if($_SESSION['categorie'] != 'traducteur' && $_SESSION['categorie'] != 'admin' ){
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
if(!isset($_SESSION['request'])){
?>

<form action="pagetraducteur-processing.php" method="post">
    Mot à ajouter en base de donnée : <br>
    <input type="text" name="mot">
    Langue : <select name="lang" id="">
        <option value="francais"> Francais </option>
        <option value="anglais"> Anglais </option>
    </select><br>
    <input type="text" name="trad"><br>
    <input type="submit" name="action" value="Envoyer"><br>
</form>
<?php
    unset($_SESSION['request']);
}
else {
    ?>
    <form action="pagetraducteur-processing.php" method="post">
        Mot à ajouter en base de donnée : <br>
        <input type="text" name="mot" value="<?= htmlspecialchars($_SESSION['mot1']) ?>">
        Langue : <select name="lang" id="">
            <option value="francais" <?= htmlspecialchars(($_SESSION['selected']) == 'fr' ? 'selected' : '' )  ?>> Francais </option>
            <option value="anglais" <?= htmlspecialchars(($_SESSION['selected']) == 'en' ? 'selected' : '' )  ?>> Anglais </option>
        </select><br>
        <input type="text" name="trad"><br>
        <input type="submit" name="action" value="Valider"><br>
    </form>

<?php
}
if(isset($_SESSION['envoi_reussie']))
echo htmlspecialchars($_SESSION['envoi_reussie']); $_SESSION['envoi_reussie'] = '';

$query = 'SELECT * FROM traduction WHERE etat = \'en cours\'';
if(!$dbResult = mysqli_query($dbLink, $query))
{
    echo 'Erreur dela requête<br/>';
    //Type erreur
    echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
    //Affiche requête envoyée
    echo 'Requête : ' . htmlspecialchars($query) . '<br/>';
    exit();
}

echo '<br>Demandes de traductions en attente : <br> ';

while($dbRow = mysqli_fetch_assoc($dbResult)){
    echo '<form action="pagetraducteur-processing.php" method="post"> ';
    if(empty($dbRow['fr']))
        echo 'Demande de traduction du mot anglais ' . htmlspecialchars($dbRow['en']) . ' en français  ';
    else
        echo 'Demande de traduction du mot français ' . htmlspecialchars($dbRow['fr']) . ' en anglais  ';
    echo '<input type="submit" name="action" value="Résoudre" >
            <input type="submit" name="action" value="Refuser">
            <input type="hidden" name="id" value="' . htmlspecialchars($dbRow['id'])  .'">
            <input type="hidden" name="fr" value="' . htmlspecialchars($dbRow['fr'])  .'">
            <input type="hidden" name="en" value="' . htmlspecialchars($dbRow['en'])  .'"></form>';
}

$query = 'SELECT * FROM traduction WHERE etat = \'accepté\'';
if(!$dbResult = mysqli_query($dbLink, $query))
{
    echo 'Erreur dela requête<br/>';
    //Type erreur
    echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
    //Affiche requête envoyée
    echo 'Requête : ' . htmlspecialchars($query) . '<br/>';
    exit();
}
echo '<br>Traductions en base de données acceptées : <br> ';
while($dbRow = mysqli_fetch_assoc($dbResult)){
    echo '<form action="pagetraducteur-processing.php" method="post"> ';
    echo 'Traduction du mot français ' .htmlspecialchars( $dbRow['fr']) . ' en anglais :  ' . htmlspecialchars($dbRow['en']) . '<br>';
    echo '<input type="submit" name="action" value="Changer la traduction fr" >
            <input type="submit" name="action" value="Changer la traduction en">
            <input type="submit" name="action" value="Supprimer">
            <input type="hidden" name="id" value="' . htmlspecialchars($dbRow['id']) .'">
            <input type="hidden" name="fr" value="' . htmlspecialchars($dbRow['fr'])  .'">
            <input type="hidden" name="en" value="' . htmlspecialchars($dbRow['en'])  .'"></form><pre></pre>';
}

$query = 'SELECT * FROM traduction WHERE etat = \'refusé\'';
if(!$dbResult = mysqli_query($dbLink, $query))
{
    echo 'Erreur dela requête<br/>';
    //Type erreur
    echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
    //Affiche requête envoyée
    echo 'Requête : ' . htmlspecialchars($query) . '<br/>';
    exit();
}
echo '<br>Traductions refusées : <br> ';
while($dbRow = mysqli_fetch_assoc($dbResult)){
    if(empty($dbRow['fr']))
        echo 'Demande de traduction du mot anglais ' . htmlspecialchars($dbRow['en']) . ' en français <br> ';
    else
        echo 'Demande de traduction du mot français ' . htmlspecialchars($dbRow['fr']) . ' en anglais <br> ';
}

?>

<br>Exporter une langue
<form action="pagetraducteur-processing.php" method="post">
    <select name="langexport">
        <option value="fr">Francais</option>
        <option value="en">Anglais</option>
    </select>
    <input type="submit" name="action" value="Export">
</form>
<a href="lang/<?php echo $_SESSION['langexport']. '.po' ?>" download>Cliquez ici pour telecharger votre exportation (voir au dessus)</a>
