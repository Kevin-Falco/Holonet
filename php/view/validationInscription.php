<<<<<<< HEAD
<?php
debut_page();

barre_Navigation(4);
?>
    <div class="formulaire">
        <form action="/controller/verifCodeModelController.php" method="post">
            <label><?= gettext('Code d\'activation reçu par e-mail')?></label><br/>
            <input type="text"  name="code"/><br/><br/>
            <input id="cc" type="submit" name="action" value="Valider"/><br/>
        </form>
    </div>
    <div class="erreur">
        <?= $message_erreur ?>
    </div>
=======
<?php
debut_page();

barre_Navigation(4);
?>
    <div class="formulaire">
        <form action="/controller/verifCodeModelController.php" method="post">
            <label><?= gettext('Code d\'activation reçu par e-mail')?></label><br/>
            <input type="text"  name="code"/><br/><br/>
            <input id="cc" type="submit" name="action" value="Valider"/><br/>
        </form>
    </div>
    <div class="erreur">
        <?= $message_erreur ?>
    </div>
>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf
<?php fin_page(); ?>