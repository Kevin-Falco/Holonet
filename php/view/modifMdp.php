<?php
debut_page();

barre_Navigation(4);
?>
<div class="formulaire">
    <form action="/controller/modifMdpModelController.php" method="post">
        <label><?= gettext('Ancien Mot de passe')?></label><br/>
        <input type="password" name="ancien_mdp" required><br/>

        <label><?= gettext('Nouveau Mot de passe')?></label><br/>
        <input type="password" name="nouveau_mdp" required/><br/>

        <label><?= gettext('Vérification nouveau mot de passe')?></label><br/>
        <input type="password" name="verif_nouveau_mdp" required/><br/><br/>

        <input type="hidden" name="action" value="Valider"/>
        <input id="cc" type="submit" value="<?= gettext('Valider')?>"/><br/>
    </form>
</div>
<div class="erreur">
    <?= $message_erreur ?>
</div>

<?php
fin_page();
?>
