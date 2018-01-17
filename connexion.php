<?php
    include 'utils.inc.php';

    debut_page();

    if ($_GET['step'] == 'ERROR')
    {
        echo 'Erreur d\'email ou de mot de passe.';
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


    <form action="testConnexion.php" method="post">

        <label>Email</label><br/>
        <input type="text" name="email"><br/>

        <label>Mot de passe</label><br/>
        <input type="password" name="mdp"/><br/>

        <input type="submit" name="action" value="connexion"/><br/>

    </form>
    <a href="mdp_oublie.php">Mot de passe oublié ?</a>
    <a href="inscription.php">S'inscrire</a>

<?php
    fin_page();
?>