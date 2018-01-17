<?php
    include 'utils.inc.php';

    session_start();
    debut_page();

    if ($_GET['step'] == 'EMAIL_EXIST')
    {
        echo 'Erreur dans les mots de passe, veuillez réessayer.';
    }
?>

    <div class="formulaire">

        <form action="testModifMdp.php" method="post">

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
