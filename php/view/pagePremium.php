<<<<<<< HEAD
<?php
debut_page();

barre_Navigation(2);
?>

<div class="formulaire">
    <form action="/controller/pagePremiumModelController.php" method="post">
        <?= gettext('Détecter la langue d\'un mot :')?><br/>
        <input type="text" name="mot"><br/><br/>
        <input type="hidden" name="action" value="Détecter">
        <input type="submit" value=<?= gettext('Détecter')?>><br/>
    </form>
</div>
<div class="erreur">
    <?= $detect ?><br/><br/>
</div>
<div class="formulaire">
    <form action="/controller/pagePremiumModelController.php" method="post">
        <?= gettext('Mot à demander :')?> <br/>
        <input type="text" name="mot"><br/><br/>

        <?= gettext('Langue : ')?>
        <select name="lang" id="">
            <option value="francais"> <?= gettext('Francais')?> </option>
            <option value="anglais"> <?= gettext('Anglais')?></option>
        </select><br/><br/>

        <input type="hidden" name="action" value="Demander">
        <input type="submit" value=<?= gettext('Demander')?>><br/>
    </form>
</div>
<div class="erreur">
    <?= $demande_reussie?>
</div>
<div class="traduction">
    <?php
    echo '<h2>'. gettext('Demandes de traductions en cours :') . '</h2>';
    echo $demande_en_cours;

    echo '<h2>' . gettext('Demandes de traductions refusées :') . '</h2>';
    echo $demande_refusee;

    echo '<h2>'. gettext('Demandes de traductions acceptées :') . '</h2>';
    echo $demande_acceptee;
    ?>
</div>

<?php fin_page() ?>
=======
<?php
debut_page();

barre_Navigation(2);
?>

<div class="formulaire">
    <form action="/controller/pagePremiumModelController.php" method="post">
        <?= gettext('Détecter la langue d\'un mot :')?><br/>
        <input type="text" name="mot"><br/><br/>
        <input type="hidden" name="action" value="Détecter">
        <input type="submit" value=<?= gettext('Détecter')?>><br/>
    </form>
</div>
<div class="erreur">
    <?= $detect ?><br/><br/>
</div>
<div class="formulaire">
    <form action="/controller/pagePremiumModelController.php" method="post">
        <?= gettext('Mot à demander :')?> <br/>
        <input type="text" name="mot"><br/><br/>

        <?= gettext('Langue : ')?>
        <select name="lang" id="">
            <option value="francais"> <?= gettext('Francais')?> </option>
            <option value="anglais"> <?= gettext('Anglais')?></option>
        </select><br/><br/>

        <input type="hidden" name="action" value="Demander">
        <input type="submit" value=<?= gettext('Demander')?>><br/>
    </form>
</div>
<div class="erreur">
    <?= $demande_reussie?>
</div>
<div class="traduction">
    <?php
    echo '<h2>'. gettext('Demandes de traductions en cours :') . '</h2>';
    echo $demande_en_cours;

    echo '<h2>' . gettext('Demandes de traductions refusées :') . '</h2>';
    echo $demande_refusee;

    echo '<h2>'. gettext('Demandes de traductions acceptées :') . '</h2>';
    echo $demande_acceptee;
    ?>
</div>

<?php fin_page() ?>
>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf
