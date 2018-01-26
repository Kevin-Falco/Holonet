<?php debut_page() ?>

    <?=$message_erreur ?>

    <header>
        <!-- Vide -->
    </header>
    <?php barre_Navigation() ?>

    <div class="Changement">
        Entrez votre adresse e-mail. Si vous êtes inscrit vous recevrez un nouveau mot de passe via cette adresse.
        <form action="../controller/mail_mdpModelController.php" method="post">
            <label>Email</label><br/>
            <input type="email" name="email"/><br/>
            <input type="submit" name="action" value="mailer"/><br/>
        </form>
    </div>

<?php fin_page(); ?>
