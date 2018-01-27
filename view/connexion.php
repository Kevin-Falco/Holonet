<?php
debut_page();

barre_Navigation(4);

echo $message_erreur ;?>

    <label class="titre"><?= gettext('Connexion') ?></label>
    <form action="/controller/connexionModelController.php" method="post">
        <label><?= gettext('Email') ?></label><br/>
        <input type="text" name="email"><br/>

        <label><?= gettext('Mot de passe') ?></label><br/>
        <input type="password" name="mdp"/><br/>

        <input type="submit" name="action" value="connexion"/><br/>

    </form>
    <a href="mdp_oublie.php"><?= gettext('Mot de passe oublié ?') ?></a>
    <a href="inscription.php"><?= gettext('S\'inscrire') ?></a>

<?php fin_page() ?>