<?php
include 'utils.inc.php';
include 'trad.php';

session_start();
debut_page();
?>

    <header>
        <!-- Vide -->
    </header>

<?php barre_Navigation(2); //__FILE__?>

    <label><?php echo gettext('Vérification effectuée √'); ?></label><br/>
    <a href="index.php"><?php echo gettext('Retourner à l\'accueil') ?></a>

<?php
fin_page();
?>
