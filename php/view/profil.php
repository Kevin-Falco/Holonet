<<<<<<< HEAD
<?php
debut_page();

barre_Navigation(4);
?>

<div class="formulaire">
    <label class="titre">PROFIL</label>
    <button type="button" class="btn btn-danger"><?= strtoupper($_SESSION['categorie']) ?></button>

    <label>Pseudo</label><br/>
    <?= htmlspecialchars($_SESSION['pseudo']) ?><br/><br/>

    <label>Email</label><br/>
    <?= htmlspecialchars($_SESSION['email']) ?>

    <br/><br/><input type="button" value="<?= gettext('Modifier son mot de passe')?>" onClick="javascript:document.location.href='/controller/modifMdpController.php<?= $lang ?> '" /><br/><br/>

    <?= $gestion_utils?>
    <input type="button" value="<?= gettext('Se déconnecter')?>" onClick="javascript:document.location.href='/controller/deconnexion.php'" />
</div>

<?php
fin_page();
?>
=======
<?php
debut_page();

barre_Navigation(4);
?>

<div class="formulaire">
    <label class="titre">PROFIL</label>
    <button type="button" class="btn btn-danger"><?= strtoupper($_SESSION['categorie']) ?></button>

    <label>Pseudo</label><br/>
    <?= htmlspecialchars($_SESSION['pseudo']) ?><br/><br/>

    <label>Email</label><br/>
    <?= htmlspecialchars($_SESSION['email']) ?>

    <br/><br/><input type="button" value="<?= gettext('Modifier son mot de passe')?>" onClick="javascript:document.location.href='/controller/modifMdpController.php<?= $lang ?> '" /><br/><br/>

    <?= $gestion_utils?>
    <input type="button" value="<?= gettext('Se déconnecter')?>" onClick="javascript:document.location.href='/controller/deconnexion.php'" />
</div>

<?php
fin_page();
?>
>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf
