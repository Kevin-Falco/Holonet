<?php
    include 'utils.inc.php';

    session_start();
    debut_page();

    if ($_GET['step'] == 'MODIF_MDP')
    {
        echo 'Mot de passe modifié.';
    }
    else if($_GET['step'] == 'ERROR_VERIF')
    {
        echo 'Mauvaise vérification du mot de passe. Réessayez.';
    }
    else if ($_GET['step'] == 'MDP_INCORRECT')
    {
        echo 'Mot de passe incorrect, veuillez réessayer.';
    }


?>
    <header>

    </header>
    <?php barre_Navigation(3);?>

    <div class="profil">
        <label>Pseudo</label><br/>
        <?=$_SESSION['pseudo']?><br/><br/>

        <label>Email</label><br/>
        <?=$_SESSION['email']?><br/><br/>

        <input type="button" value="Modifier son mot de passe" onClick="javascript:document.location.href='modifMdp.php'" /><br/><br/>
        <?php
        if (isset($_SESSION['pseudo']))
        {
            if ($_SESSION['categorie']=='admin')
            {
                echo '<form action="gestion_utilisateurs.php"> <input type="submit" value="Gestion utilisateurs"/></form><br/>';
            }
        }
        ?>
        <input type="button" value="Se déconnecter" onClick="javascript:document.location.href='deconnexion.php'" />

    </div>
<?php
    fin_page();
?>
