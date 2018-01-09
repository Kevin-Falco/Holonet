<?php
    include 'utils.inc.php';

    debut_page();
?>
    <header>
        <!-- Vide -->
    </header>
    <?php barre_Navigation(3); //__FILE__?>
<div class="formulaire">
    <form action="data-processing.php" method="post">
        <label>Identifiant</label><br/>
        <input type="text" name="identifiant"><br/>

        <label>Email</label><br/>
        <input type="email" name="email"/><br/>


        <label>Mot de passe</label><br/>
        <input type="password" name="mdp"/><br/>


        <label>Vérification mot de passe</label><br/>
        <input type="password" name="verifmdp"/><br/>

        <label>Conditions générales</label> : <input type="checkbox"/><br/>

        <input type="submit" name="action" value="mailer"/><br/>

    </form>
</div>
<?php
    fin_page();
?>