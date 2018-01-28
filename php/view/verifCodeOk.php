<?php
debut_page();

barre_Navigation(4);
?>
    <div class="formulaire">
        <label id="verif"><?= gettext('Vérification effectuée √'); ?></label><br/><br/>
        <a href="/controller/index.php"><?= gettext('Retourner à l\'accueil') ?></a>
    </div>
<?php
    fin_page();
?>