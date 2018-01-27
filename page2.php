<!-- Cette page a été traitée -->
<?php
    include 'trad.php';
    include 'utils.inc.php';

    debut_page();

    barre_Navigation(3);
?>
<div class="article">
    <?= gettext('Voici la page 2. Elle n\'a aucune spécificité donc envoyez nous vos idées.')?>
</div>
<?php
    fin_page();
?>