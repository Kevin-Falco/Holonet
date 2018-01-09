<?php
    include 'utils.inc.php';

    debut_page();
?>

    <header>
        <!-- Vide -->
    </header>
    <?php barre_Navigation(3); //__FILE__?>

    <form action="test-pass.php" method="post">

        <label>Identifiant</label> : <input type="text" name="identifiant"><br/>

        <label>Mot de passe</label><br/>
        <input type="password" name="mdp"/><br/>

        <input type="submit" name="action" value="mailer"/>Se connecter<br/>

    </form>

<?php
    fin_page();
?>