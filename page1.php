<?php
include 'utils.inc.php';
include 'trad.php';

debut_page();


?>
    <header>
        <!-- Vide -->
    </header>

<?php barre_Navigation(2); //__FILE__?>

    <div class="article">
        <?= 'La page 1 où on rigole ienb';?>
    </div>

    <form action="page1trad.php" method="post">
        Mot à traduire : <br>
        <input type="text" name="mot"><br>
        Langue : <select name="lang" id="">
            <option value="francais"> Francais </option>
            <option value="anglais"> Anglais </option>
        </select><br>
        <input type="submit" name="action" value="Traduire"><br>
    </form>

<?php
if(isset($_SESSION['trad_sentence']))
    echo $_SESSION['trad_sentence']; $_SESSION['trad_sentence'] = '';
if(isset($_SESSION['non_connecté']))
    echo $_SESSION['non_connecté']; $_SESSION['non_connecté'] = '';

    if (isset($_SESSION['categorie']) &&
        ($_SESSION['categorie'] == 'premium' || $_SESSION['categorie'] == 'traducteur' || $_SESSION['categorie'] == 'admin' )) {
        echo '<a href="pagepremium.php"><br>Page Premium</a><br>';
        if($_SESSION['categorie'] == 'traducteur' || $_SESSION['categorie'] == 'admin')
            echo '<a href="pagetraducteur.php">Page Traducteur</a><br>';

    }
    fin_page();
?>
