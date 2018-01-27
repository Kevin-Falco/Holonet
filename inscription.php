<!-- Cette page a été traitée -->
<?php
    include 'trad.php';
    include 'utils.inc.php';

    debut_page();

    if (isset($_GET['step'])) {
        if ($_GET['step'] == 'EMAIL_EXIST') {
            echo 'Erreur, e-mail déjà utilisé.';
        } else if ($_GET['step'] == 'BAD_MDP') {
            echo 'Mot de passes non identiques.';
        }
    }

    barre_Navigation(4);
?>
<label class="titre"><?php echo gettext('Inscription'); ?></label>
<div class="formulaire">
    <form action="testInscription.php" method="post">
        <label><?= gettext('Pseudo'); ?></label><br/>
        <input type="text" name="pseudo" required><br/>

        <label><?= gettext('Email'); ?></label><br/>
        <input type="email" name="email" required/><br/>

        <label><?= gettext('Mot de passe'); ?></label><br/>
        <input type="password" name="mdp" required/><br/>

        <label><?= gettext('Vérification mot de passe'); ?></label><br/>
        <input type="password" name="verifmdp" required/><br/>

        <label><?= gettext('Status'); ?></label><br/>
        <input type="radio" name="status"  value="standard" required/><?= gettext('Standard'); ?><br/>
        <input type="radio" name="status"  value="premium" required/><?= gettext('Premium'); ?><br/>
        <input type="radio" name="status"  value="traducteur" required/><?= gettext('Traducteur'); ?><br/>

        <label><?= gettext('Conditions générales'); ?></label> : <input type="checkbox" required/><br/>
        <input type="submit" name="action" value="Valider"/><br/>
    </form>
</div>
<?php
    fin_page();
?>