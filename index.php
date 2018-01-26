<?php
    include 'trad.php';
    include 'utils.inc.php';

    session_start();
    debut_page();
?>

<header>
    <!-- Vide -->
</header>

<?php barre_Navigation(1); //__FILE__?>

<?php
    if($_SESSION['login'] == 'ok') {
        echo 'Magecraft : ' . $_SESSION['pseudo'];
    }
?>

<div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="img/cote_obscur.jpg" alt="Côté obscur" style="height: 288px; width: 600px;">
                <div class="carousel-caption">
                    <h3>Passez du côté obscur de la force</h3>
                </div>
            </div>
            <div class="item">
                <img src="img/cote_lumineux.jpg" alt="Côté lumineux" style="height: 288px; width: 600px;">
                <div class="carousel-caption">
                    <h3>Que la force soit avec vous</h3>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div id="presentation">
    <p>
        Bonjour et bienvenue sur le Best Sith Ever, votre site de traduction préféré. Ici, vous pourrez traduire vos textes grâce à la puissance du côté obscur.
    Nous sommes Hugo Fasone, Kévin Falco, Léo Ferrer-Laroche, Théo Hebrard et Anthony Jou, 5 étudiants en DUT d’informatique.
    Connectez-vous pour profiter de nos pouvoirs sur la force de manière illimitée, ou devenez un membre premium pour nous aider à les étendre !<br/>Et que la force soit avec vous!<br/>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    </p>
</div>

<?php foreach($_POST['locales'] as $l) {
    print "[<a href=\"?lang=$l\">$l</a>] ";
}
print "</p>\n"; ?>

<?php
    fin_page();
?>
