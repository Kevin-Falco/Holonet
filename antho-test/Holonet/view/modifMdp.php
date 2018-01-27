<?php debut_page() ?>

    <?= $message_erreur ;?>

    <header>

    </header>
    <?php barre_Navigation();?>

    <div class="formulaire">

        <form action="/controller/modifMdpModelController.php" method="post">

            <label>Ancien Mot de passe</label><br/>
            <input type="password" name="ancien_mdp" required><br/>

            <label>Nouveau Mot de passe</label><br/>
            <input type="password" name="nouveau_mdp" required/><br/>

            <label>Vérification nouveau mot de passe</label><br/>
            <input type="password" name="verif_nouveau_mdp" required/><br/>


            <input type="submit" name="action" value="Valider"/><br/>

        </form>
    </div>

<?php
    fin_page();
?>
