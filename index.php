<?php
    include 'utils.inc.php';

    session_start();
    debut_page();
?>
    <header>
        <!-- Vide -->
    </header>
    <?php barre_Navigation(0); //__FILE__?>

    <div class="container-fluid">
        <p><?= 'Mettre du texte à la place des balises br. PS : le bootstrap c\'est bien et normalement le site est responsive (pour l\'instant)'?></p>
        <div class="row">
            <div class="col-xs-1 col-sm-4"></div>
            <div class="col-xs-10 col-sm-4 used">
                <p>Yo la millefa</p>
            </div>
            <div class="col-xs-1 col-sm-4"></div>
        </div>
        <div>
            <div class="col-xs-12"><br/></div>
        </div>
        <div class="row">
            <div class="col-xs-1 col-sm-6"></div>
            <div class="col-xs-10 col-sm-4 used">
                <p>J'ai pas d'idée</p>
            </div>
            <div class="col-xs-1 col-sm-2"></div>
        </div>
        <div>
            <div class="col-xs-12"><br/></div>
        </div>
        <div class="row">
            <div class="col-xs-1 col-sm-1"></div>
            <div class="col-xs-10 col-sm-4 used">
                <p>Qu'est ce qui est jaune et qui attend ?</p>
            </div>
            <div class="col-xs-1 col-sm-7"></div>
        </div>
        <div>
            <div class="col-xs-12"><br/></div>
        </div>
        <div class="row">
            <div class="col-xs-1 col-sm-5"></div>
            <div class="col-xs-10 col-sm-4 used">
                <p>Jonathan</p>
            </div>
            <div class="col-xs-1 col-sm-3"></div>
        </div>
        <div>
            <div class="col-xs-12"><br/></div>
        </div>
        <div class="row">
            <div class="col-xs-1 col-sm-2"></div>
            <div class="col-xs-10 col-sm-4 used">
                <p>Jaune attend</p>
            </div>
            <div class="col-xs-1 col-sm-6"></div>
        </div>
        <div>
            <div class="col-xs-12"><br/></div>
        </div>
        <div class="row">
            <div class="col-xs-1 col-sm-1"></div>
            <div class="col-xs-4 col-sm-4 used">
                <p>ptdr</p>
            </div>
            <div class="col-xs-2 col-sm-2"></div>
            <div class="col-xs-4 col-sm-4 used">
                <p>lol</p>
            </div>
            <div class="col-xs-1 col-sm-1"></div>
        </div>
        <div>
            <div class="col-xs-12"><br/></div>
        </div>
        <div class="row">
            <div class="col-xs-1 col-sm-6"></div>
            <div class="col-xs-10 col-sm-4 used">
                <p>Trop des barres</p>
            </div>
            <div class="col-xs-1 col-sm-2"></div>
        </div>
    </div>
<?php
    fin_page();
?>