<?php
    include 'utils.inc.php';

    session_start();
    debut_page();

    if($_GET['step'] == 'ERROR_EMAIL')
    {
        echo 'E-mail non valide. Réessayez. <br/>';
    }
?>

    <header>
        <!-- Vide -->
    </header>
    <?php barre_Navigation(3) ?>

    <div class="Changement">
        Entrez votre adresse e-mail. Si vous êtes inscrit vous recevrez un nouveau mot de passe via cette adresse.
        <form action="mail_mdp.php" method="post">
            <label>Email</label><br/>
            <input type="email" name="email"/><br/>
            <input type="submit" name="action" value="mailer"/><br/>
        </form>
    </div>

<?php
    fin_page();
?>
