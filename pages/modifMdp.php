<?php
    include 'utils.inc.php';

    session_start();
    debut_page();

    if ($_GET['step'] == 'ERROR_VERIF')
    {
        echo 'Erreur dans les mots de passe, veuillez réessayer.';
    }
    else if ($_GET['step'] == 'ERROR_ANCIEN')
    {
        echo 'Erreur, votre nouveau mot de passe ne peut pas être l\'ancien.';
    }
    else if ($_GET['step'] == 'MDP_INCORRECT')
    {
        echo 'Erreur dans l\'ancien mot de passe, veuillez réessayer.';
    }

?>
    <header>

    </header>
    <?php barre_Navigation(3);?>

    <div class="formulaire">

        <form action="../BD/testModifMdp.php" method="post">

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
