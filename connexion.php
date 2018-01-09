<?php
    include 'utils.inc.php';

    debut_page();

    if ($_GET['step'] == 'ERROR')
    {
        echo 'Erreur de connexion, veuillez réessayer';
    }
    else if ($_GET['step'] == 'VALIDATION')
    {
        echo 'Erreur, e-mail non-validée.';
    }
?>

    <header>
        <!-- Vide -->
    </header>
    <?php barre_Navigation(3); //__FILE__?>

    <label class="titre">Connexion</label>
+
    <form action="testConnexion.php" method="post">

        <label>Pseudo</label><br/>
        <input type="text" name="pseudo"><br/>

        <label>Mot de passe</label><br/>
        <input type="password" name="mdp"/><br/>

        <input type="submit" name="action" value="connexion"/><br/>

    </form>
    <a href="mdp_oublie.php">Mot de passe oublié ?</a>

<?php
    fin_page();
?>