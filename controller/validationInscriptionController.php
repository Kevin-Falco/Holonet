<?php
    require('../utils.inc.php');

    if ($_GET['step'] == 'ERROR')
    {
        echo 'Erreur de code';
    }

    require('../validationInscription.php');