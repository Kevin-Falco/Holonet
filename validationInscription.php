<?php debut_page(); ?>
    <header>
        <!-- Vide -->
    </header>

    <?php barre_Navigation(); //__FILE__?>

    <form action="verificationCode.php" method="post">

        <label>Code d'activation reçu par e-mail</label><br/>
        <input type="text"  name="code"/><br/>

        <input type="submit" name="action" value="Valider"/><br/>

    </form>
<?php fin_page(); ?>