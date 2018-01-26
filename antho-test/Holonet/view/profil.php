<?php debut_page(); ?>

    <?= $message_erreur ;?>

    <header>

    </header>
    <?php barre_Navigation(4);?>

    <div class="profil">
        <label>Pseudo</label><br/>
        <?=$_SESSION['pseudo']?><br/><br/>

        <label>Email</label><br/>
        <?=$_SESSION['email']?><br/><br/>

        <input type="button" value="Modifier son mot de passe" onClick="javascript:document.location.href='/controller/modifMdpController.php'" /><br/><br/>

        <input type="button" value="Se déconnecter" onClick="javascript:document.location.href='/controller/deconnexion.php'" />

    </div>

<?php
    fin_page();
?>
