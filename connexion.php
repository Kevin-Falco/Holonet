<?php
    include '../utilitaires/utils.inc.php';

    debut_page();

    if ($_GET['step'] == 'ERROR_MDP')
    {
        echo 'Erreur de mot de passe.';
    }
    else if ($_GET['step'] == 'ERROR_EMAIL')
    {
        echo 'Erreur, l\'e-mail n\'existe pas.';
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


    <form action="../BD/testConnexion.php" method="post">

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