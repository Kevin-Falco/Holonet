<?php
debut_page();

barre_Navigation(2);

echo $request;

echo $envoie_reussie;

echo '<h2>' . gettext('Demandes de traductions en attente :') . '</h2>';
echo $trad_en_attente;


echo '<h2>' . gettext('Traductions en base de données acceptées :') . '</h2>';
echo $trad_BD_acceptees;


echo '<h2>' . gettext('Traductions refusées :') . '</h2>';
echo $trad_refusee;

?>
    </div>
    <div class="formulaire">
        <?= gettext('Exporter une langue') ?><br/><br/>
        <form action="/controller/pageTraducteurModelController.php" method="post">
            <select name="langexport">
                <option value="fr"><?= gettext('Francais')?></option>
                <option value="en"><?= gettext('Anglais')?></option>
            </select><br/><br/>
            <input type="submit" name="action" value="Export">
        </form><br/>
        <a href="http://bestsithever.alwaysdata.net/lang/<?= $_SESSION['langexport']. '.po' ?>" download><?= gettext('Cliquez ici pour telecharger votre exportation (voir au dessus)')?></a>
    </div>
<?php
fin_page()
?>