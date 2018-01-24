<?php debut_page(); ?>

    <?= $message_erreur ?>

    <header>
        <!-- Vide -->
    </header>
    <?php barre_Navigation(); //__FILE__?>

    <label class="titre">Inscription</label>

    <div class="formulaire">

        <form action="/controller/inscriptionModelController.php" method="post">

            <label>Pseudo</label><br/>
            <input type="text" name="pseudo" required><br/>

            <label>Email</label><br/>
            <input type="email" name="email" required/><br/>

            <label>Mot de passe</label><br/>
            <input type="password" name="mdp" required/><br/>


            <label>Vérification mot de passe</label><br/>
            <input type="password" name="verifmdp" required/><br/>

            <label>Status</label><br/>
            <input type="radio" name="status"  value="standard" required/>Standard<br/>
            <input type="radio" name="status"  value="premium" required/>Premium<br/>
            <input type="radio" name="status"  value="traducteur" required/>Traducteur<br/>

            <label>Conditions générales</label> : <input type="checkbox" required/><br/>

            <input type="submit" name="action" value="Valider"/><br/>

        </form>
    </div>

<?php fin_page(); ?>