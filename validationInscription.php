<!-- Cette page a été traitée -->
<?php
    include 'trad.php';
    include 'utils.inc.php';

    debut_page();

    if (isset($_GET['step']) && $_GET['step'] == 'ERROR') {
        echo 'Erreur de code';
    }

    barre_Navigation(4);
?>
<form action="verificationCode.php" method="post">
    <label><?= gettext('Code d\'activation reçu par e-mail')?></label><br/>
    <input type="text"  name="code"/><br/>
    <input type="submit" name="action" value="Valider"/><br/>
</form>
<?php
    fin_page();
?>