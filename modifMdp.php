<?php
    include 'utils.inc.php';

    session_start();
    debut_page();
?>

    <div class="formulaire">

        <form action="testModifMdp.php" method="post">

            <label>Ancien Mot de passe</label><br/>
            <input type="text" name="pseudo" required><br/>

            <label>Nouveau Mot de passe</label><br/>
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


<?php
    fin_page();
?>
