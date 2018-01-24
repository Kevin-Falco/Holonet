<?php
include 'trad.php';
include 'utils.inc.php';

session_start();
debut_page();


?>
    <header>
        <!-- Vide -->
    </header>

<?php barre_Navigation(1); //__FILE__?>

    <div class="article">
        <?= 'La page 1 où on rigole ienb';?>
    </div>

<?php


if (isset($_SESSION['pseudo'])) {
    if ($_SESSION['categorie'] == 'standard' || $_SESSION['categorie'] == 'premium' || $_SESSION['categorie'] == 'traducteur' || $_SESSION['categorie'] == 'admin') { ?>

        <form action="">
            Mot à traduire : <br>
            <input type="text" name="mot"><br>
            Langue : <select name="lang" id="">
                <option value="francais"> Francais </option>
                <option value="anglais"> Anglais </option>
                <option value="moldave"> Moldave </option>
            </select><br>
            <input type="button" value="Traduire"><br>
            Mot traduit :

        </form>
        <?php
    } if ($_SESSION['categorie'] == 'premium'){
        ?>
        <br><br><br> Parce que vous êtes premium, vous avez le droit à plus de fonctionnalités mamene !<br><br>
        <form action="">
            Mot de base : <br>
            <input type="text" name="mot1"><br>
            Traduction du mot : <br>
            <input type="text" name="mot2"><br>
            Langue de base : <select name="lang1" id="">
                <option value="francais"> Francais </option>
                <option value="anglais"> Anglais </option>
                <option value="moldave"> Moldave </option>
            </select><br>
            Langue pour la traduction : <select name="lang" id="">
                <option value="francais"> Francais </option>
                <option value="anglais"> Anglais </option>
                <option value="moldave"> Moldave </option>
            </select><br>
            <input type="button" value="Traduire"><br>

        </form>
        <?php
    }
}
fin_page();
?>
