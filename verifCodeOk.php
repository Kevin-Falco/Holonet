<?php
    include '../utilitaires/utils.inc.php';

    session_start();
    debut_page();
?>

    <header>
        <!-- Vide -->
    </header>

    <?php barre_Navigation(2); //__FILE__?>

    <label>Vérification effectuée √</label><br/>
    <a href="index.php">Retourner à l'accueil</a>

<?php
    fin_page();
?>