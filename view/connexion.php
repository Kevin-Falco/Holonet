<?php debut_page() ?>

    <?= $message_erreur ;?>

    <header>
        <!-- Vide -->
    </header>
    <?php barre_Navigation(4); //__FILE__?>

    <label class="titre">Connexion</label>


    <form action="/controller/connexionModelController.php" method="post">

        <label>Email</label><br/>
        <input type="text" name="email"><br/>

        <label>Mot de passe</label><br/>
        <input type="password" name="mdp"/><br/>

        <input type="submit" name="action" value="connexion"/><br/>

    </form>
    <a href="/mdp_oublie.php">Mot de passe oublié ?</a>
    <a href="/controller/inscriptionController.php">S'inscrire</a>

<?php fin_page() ?>