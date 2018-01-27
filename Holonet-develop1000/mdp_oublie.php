<!-- Cette page a été traitée -->
<?php
    include 'trad.php';
    include 'utils.inc.php';

    debut_page();

    if(isset($_GET['step']) && $_GET['step'] == 'ERROR_EMAIL') {
        echo gettext('E-mail non valide. Réessayez.') . ' <br/>';
    }

    barre_Navigation(4)
?>
<div class="Changement">
    <?= gettext('Entrez votre adresse e-mail. Si vous êtes inscrit vous recevrez un nouveau mot de passe via cette adresse.')?>
    <form action="mail_mdp.php" method="post">
        <label>Email</label><br/>
        <input type="email" name="email"/><br/>
        <input type="submit" name="action" value="mailer"/><br/>
    </form>
</div>
<?php
    fin_page();
?>
