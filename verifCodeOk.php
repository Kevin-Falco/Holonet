<!-- Cette page a été traitée -->
<?php
    include 'trad.php';
    include 'utils.inc.php';

    debut_page();

    barre_Navigation(4);
?>
<label><?= gettext('Vérification effectuée √'); ?></label><br/>
<a href="index.php"><?= gettext('Retourner à l\'accueil') ?></a>
<?php
    fin_page();
?>