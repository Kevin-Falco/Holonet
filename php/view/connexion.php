<?php
debut_page();

barre_Navigation(4);
?>
    <div class="formulaire">
        <form action="/controller/connexionModelController.php" method="post">
            <label class="titre"><?= gettext('Connexion') ?></label><br/>

            <label><?= gettext('Email') ?></label><br/>
            <input type="text" name="email"><br/>

            <label><?= gettext('Mot de passe') ?></label><br/>
            <input type="password" name="mdp"/><br/><br/><br/>

            <input id="cc" type="submit" name="action" value="connexion"/><br/><br/><br/>

            <a href="/controller/mail_mdpModelController.php"><?= gettext('Mot de passe oublié ?') ?></a>
            <a href="/controller/inscriptionController.php"><?= gettext('S\'inscrire') ?></a>
        </form>
    </div>
    <div class="erreur">
        <?= $message_erreur?>
    </div>

<?php fin_page() ?>