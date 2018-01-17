<?php
    include 'utils.inc.php';

    session_start();

    debut_page();

?>
<header>
    <!-- Vide -->
</header>

<?php barre_Navigation(1); //__FILE__?>

<div class="article">
    <?= 'La page 1 où on rigole ienb';?>
</div>
<?php
    fin_page();
?>