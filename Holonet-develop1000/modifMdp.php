<!-- Cette page a été traitée -->
<?php
    include 'trad.php';
    include 'utils.inc.php';

    debut_page();

    if (isset($_GET['step'])) {
        if ($_GET['step'] == 'ERROR_VERIF') {
            echo 'Erreur dans les mots de passe, veuillez réessayer.';
        } else if ($_GET['step'] == 'ERROR_ANCIEN') {
            echo 'Erreur, votre nouveau mot de passe ne peut pas être l\'ancien.';
        } else if ($_GET['step'] == 'MDP_INCORRECT') {
            echo 'Erreur dans l\'ancien mot de passe, veuillez réessayer.';
        }
    }

    barre_Navigation(4);
?>
<div class="formulaire">
    <form action="testModifMdp.php" method="post">
        <label><?= gettext('Ancien Mot de passe')?></label><br/>
        <input type="password" name="ancien_mdp" required><br/>

        <label><?= gettext('Nouveau Mot de passe')?></label><br/>
        <input type="password" name="nouveau_mdp" required/><br/>

        <label><?= gettext('Vérification nouveau mot de passe')?></label><br/>
        <input type="password" name="verif_nouveau_mdp" required/><br/>

        <input type="submit" name="action" value="Valider"/><br/>
    </form>
</div>
<?php
    fin_page();
?>