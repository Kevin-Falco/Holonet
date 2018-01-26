<?php
include 'trad.php';
include 'utils.inc.php';

session_start();
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

    <label class="titre"> <?php echo gettext('Connexion') ?> </label>


    <form action="testConnexion.php" method="post">

        <label><?php echo gettext('Email') ?></label><br/>
        <input type="text" name="email"><br/>

        <label><?php echo gettext('Mot de passe') ?></label><br/>
        <input type="password" name="mdp"/><br/>

        <input type="submit" name="action" value="connexion"/><br/>

    </form>
    <a href="mdp_oublie.php"><?php echo gettext('Mot de passe oublié ?') ?></a>
    <a href="inscription.php"><?php echo gettext('S\'inscrire') ?></a>

<?php
fin_page();
?>
