<?php
include 'trad.php';
include 'utils.inc.php';

debut_page();


?>
<header>
    <!-- Vide -->
</header>

<?php barre_Navigation(2); //__FILE__?>

<div class="article">
    <?= gettext('La page 1 où on rigole ienb');?>
</div>

<form action="page1trad.php" method="post">
    <?= gettext('Mot à traduire : ')?><br>
    <input type="text" name="mot"><br>
    <?= gettext('Langue : ')?><select name="lang" id="">
        <option value="francais"> <?= gettext('Francais')?> </option>
        <option value="anglais"> <?= gettext('Anglais')?> </option>
    </select><br>
    <input type="hidden" name="action" value="Traduire"><br>
    <input type="submit" value=<?= gettext("Traduire")?>><br>
</form>

<?php
if(isset($_SESSION['trad_sentence']))
    echo $_SESSION['trad_sentence']; $_SESSION['trad_sentence'] = '';
if(isset($_SESSION['non_connecté']))
    echo $_SESSION['non_connecté']; $_SESSION['non_connecté'] = '';

if (isset($_SESSION['categorie']) &&
    ($_SESSION['categorie'] == 'premium' || $_SESSION['categorie'] == 'traducteur' || $_SESSION['categorie'] == 'admin' )) {
    echo '<a href="pagepremium.php"><br>' . gettext('Page Premium') . '</a><br>';
    if($_SESSION['categorie'] == 'traducteur' || $_SESSION['categorie'] == 'admin')
        echo '<a href="pagetraducteur.php">' . gettext('Page Traducteur') . '</a><br>';

}
fin_page();
?>
