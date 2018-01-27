<!-- Cette page a été traitée -->
<?php
    include 'trad.php';
    include 'utils.inc.php';

    debut_page();
    if (isset($_GET['step'])) {
        if ($_GET['step'] == 'MODIF_MDP') {
            echo 'Mot de passe modifié.';
        } else if ($_GET['step'] == 'ERROR_VERIF') {
            echo 'Mauvaise vérification du mot de passe. Réessayez.';
        } else if ($_GET['step'] == 'MDP_INCORRECT') {
            echo 'Mot de passe incorrect, veuillez réessayer.';
        }
    }

    barre_Navigation(4);
?>
<div class="profil">
    <label>Pseudo <?= strtoupper($_SESSION['categorie']) ?></label><br/>

    <?= $_SESSION['pseudo'] ?>

    <br/><br/><label>Email</label><br/>

    <?= $_SESSION['email'] ?>

    <br/><br/><input type="button" value="Modifier son mot de passe" onClick="javascript:document.location.href='modifMdp.php'" /><br/><br/>

    <?php
        if (isset($_SESSION['pseudo'])) {
            if ($_SESSION['categorie']=='admin') {
                echo '<form action="gestion_utilisateurs.php"> <input type="submit" value="Gestion utilisateurs"/></form><br/>';
            }
        }
    ?>
    <input type="button" value="Se déconnecter" onClick="javascript:document.location.href='deconnexion.php'" />
</div>
<?php
    fin_page();
?>