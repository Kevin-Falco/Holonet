<<<<<<< HEAD
<?php
debut_page();

barre_Navigation(4)
?>
<div class="formulaire">
    <h1><?= gettext('Entrez votre adresse e-mail. Si vous êtes inscrit vous recevrez un nouveau mot de passe via cette adresse.')?></h1>
    <form action="/controller/mail_mdpModelController.php" method="post">
        <label>Email</label><br/>
        <input type="email" name="email"/><br/>
        <input type="hidden" name="action" value="mailer"/><br/>
        <input id="cc" type="submit" value="<?= gettext('mailer')?>"/><br/>
    </form>
</div>
<div class="erreur">
    <?php $message_erreur ?>
</div>

<?php fin_page(); ?>
=======
<?php
debut_page();

barre_Navigation(4)
?>
<div class="formulaire">
    <h1><?= gettext('Entrez votre adresse e-mail. Si vous êtes inscrit vous recevrez un nouveau mot de passe via cette adresse.')?></h1>
    <form action="/controller/mail_mdpModelController.php" method="post">
        <label>Email</label><br/>
        <input type="email" name="email"/><br/>
        <input type="hidden" name="action" value="mailer"/><br/>
        <input id="cc" type="submit" value="<?= gettext('mailer')?>"/><br/>
    </form>
</div>
<div class="erreur">
    <?php $message_erreur ?>
</div>

<?php fin_page(); ?>
>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf
