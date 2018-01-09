<?php
/**
 * Created by PhpStorm.
 * User: h16005719
 * Date: 09/01/18
 * Time: 11:00
 */
include 'utils.inc.php';

debut_page();
?>

<header>
    <!-- Vide -->
</header>
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
