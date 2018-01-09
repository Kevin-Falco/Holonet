<?php
    include 'utils.inc.php';

    debut_page();

    if ($_GET['step'] == 'ERROR')
    {
        echo 'Erreur de connexion, veuillez réessayer';
    }
?>

    <header>
        <!-- Vide -->
    </header>
    <?php barre_Navigation(3); //__FILE__?>

    <form action="testConnexion.php" method="post">

        <label>Pseudo</label><br/>
        <input type="text" name="pseudo"><br/>

        <label>Mot de passe</label><br/>
        <input type="password" name="mdp"/><br/>

        <input type="submit" name="action" value="connexion"/><br/>

    </form>

<?php
    fin_page();
?>