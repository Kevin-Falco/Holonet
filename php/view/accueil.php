<?php
debut_page();

barre_Navigation(1);
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
                    <img src="/img/cote_obscur.jpg" alt="Côté obscur" style="height: 288px; width: 600px;">
                    <div class="carousel-caption">
                        <h3><?=gettext('Passez du côté obscur de la force')?></h3>
                    </div>
                </div>
                <div class="item">
                    <img src="/img/cote_lumineux.jpg" alt="Côté lumineux" style="height: 288px; width: 600px;">
                    <div class="carousel-caption">
                        <h3><?= gettext('Que la force soit avec vous')?></h3>
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
            <?= gettext('Bonjour et bienvenue sur le Best Sith Ever, votre site de traduction préféré. Ici, vous pourrez traduire vos textes grâce à la puissance du côté obscur.
    Nous sommes Hugo Fasone, Kévin Falco, Léo Ferrer-Laroche, Théo Hebrard et Anthony Jou, 5 étudiants en DUT d’informatique.
    Connectez-vous pour profiter de nos pouvoirs sur la force de manière illimitée, ou devenez un membre premium pour nous aider à les étendre !'); ?>
            <br/> <?= gettext('Et que la force soit avec vous!') ?> <br/>
        </p>
    </div>
<?php fin_page() ?>