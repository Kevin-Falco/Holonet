<?php
debut_page();

barre_Navigation(2);
?>
<div class="article">
    <?= gettext('La page 1 où on rigole ienb');?>
</div>
<div class="formulaire">
    <form action="/controller/page1ModelController.php" method="post">
        <?= gettext('Mot à traduire : ')?><br/>
        <input type="text" name="mot"><br/><br/>

        <?= gettext('Langue : ')?>
        <select name="lang" id="">
            <option value="francais"> <?= gettext('Francais')?> </option>
            <option value="anglais"> <?= gettext('Anglais')?> </option>
        </select><br/>

        <input type="hidden" name="action" value="Traduire"><br/>
        <input type="submit" value=<?= gettext("Traduire")?>><br/><br/>
        <?= $lien_premium; ?>
        <?= $lien_traducteur; ?>
    </form>
</div>
<div class="erreur">
    <?= $trad_sentence ?>
    <?= $non_connecte ?>
</div>

<?php fin_page(); ?>
