<?php
    include 'trad.php';
    include 'utils.inc.php';

    session_start();

    debut_page();
?>

<header>
    <!-- Vide -->
</header>
<?php barre_Navigation(2); //__FILE__?>
    <div class="article">
    <?= 'La page 2 où on rigole ienb';?>
</div>
<?php
    fin_page();
?>
