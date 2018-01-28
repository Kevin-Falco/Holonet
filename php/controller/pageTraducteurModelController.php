<<<<<<< HEAD
<?php
require('trad.php');
require('utils.inc.php');
require('../model/pagetraducteurModel.php');


if($_SESSION['categorie'] != 'premium' && $_SESSION['categorie'] != 'traducteur' && $_SESSION['categorie'] != 'admin' ) {
    header('Location: page1.php');
    exit();
}

if (isset($_SESSION['lang'])) {
    $p = '?lang=' . $_SESSION['lang'];
}

$action = $_POST['action'];

$trad = $_POST['trad'];
$mot = $_POST['mot'];
$id = intval($_POST['id']);

if($action == 'Envoyer'){
    if($_POST['lang'] ==  'francais')
        if(traductionAjoutFrancais($trad)) $_SESSION['envoi_reussie'] = 'La traduction a bien été ajoutée';
    else
        if(traductionAjoutAnglais($trad, $mot)) $_SESSION['envoi_reussie'] = 'La traduction a bien été ajoutée';
}

else if($action == 'Résoudre') {
    $_SESSION['request'] = '';
    $_SESSION['tradid'] = $_POST['id'];

    if(empty($_POST['fr'])) {
        $_SESSION['mot1'] = $_POST['en'];
        $_SESSION['selected'] = 'en';
    }
    else{
        $_SESSION['mot1'] = $_POST['fr'];
        $_SESSION['selected'] = 'fr';
    }
}

else if($action == 'Refuser') {
    traductionARefuser($id);
}

else if($_POST['action'] == 'Changer la traduction fr') {
    $_SESSION['request'] = '';
    $_SESSION['tradid'] = $_POST['id'];
    $_SESSION['mot1'] = $_POST['en'];
    $_SESSION['mot2'] = $_POST['fr'];
    $_SESSION['selected'] = 'en';
}
else if($action == 'Changer la traduction en') {
    $_SESSION['request'] = '';
    $_SESSION['tradid'] = $_POST['id'];
    $_SESSION['mot1'] = $_POST['fr'];
    $_SESSION['mot2'] = $_POST['en'];
    $_SESSION['selected'] = 'fr';

}
else if ($action == 'Supprimer') {
    traductionASupprimer($id);
}

else if($action == 'Valider') {
    $tradID = intval($_SESSION['tradid']);
    if ($_POST['lang'] == 'francais') {
        traductionAValiderAnglais($trad, $tradID);
    } else {
        traductionAValiderFrancais($trad, $tradID);
    }

}

else if ($action == 'Export') {
    $_SESSION['langexport'] = $_POST['langexport'];
    $filename = "../lang/" . $_POST['langexport'] . ".po";
    $handle = fopen($filename, 'w+');
    $header = "msgid \"\"
     msgstr \"\"
     \"Project-Id-Version: \\n\"
     \"POT-Creation-Date: \\n\"
     \"PO-Revision-Date: \\n\"
     \"Last-Translator: \\n\"
     \"Language-Team: \\n\"
     \"Language: " . $_POST['langexport'] . "\\n\"
     \"MIME-Version: 1.0\\n\"
     \"Content-Type: text/plain; charset=UTF-8\\n\"
     \"Content-Transfer-Encoding: 8bit\\n\"\n\n";
    fwrite($handle, $header);
    $traductions = traductionAExporter();
    while ($row = mysqli_fetch_assoc($traductions)) {
        if ($_POST['langexport'] == 'fr')
            $trad = 'msgid "' . $row['en'] . "\"\nmsgstr \"" . $row['fr'] . "\"\n\n";
        elseif ($_POST['langexport'] == 'en')
            $trad = 'msgid "' . $row['fr'] . "\"\nmsgstr \"" . $row['en'] . "\"\n\n";
        fwrite($handle, $trad);
    }
}

header("Location: pageTraducteurController.php$p");
exit();




=======
<?php
require('trad.php');
require('utils.inc.php');
require('../model/pagetraducteurModel.php');


if($_SESSION['categorie'] != 'premium' && $_SESSION['categorie'] != 'traducteur' && $_SESSION['categorie'] != 'admin' ) {
    header('Location: page1.php');
    exit();
}

if (isset($_SESSION['lang'])) {
    $p = '?lang=' . $_SESSION['lang'];
}

$action = $_POST['action'];

$trad = $_POST['trad'];
$mot = $_POST['mot'];
$id = intval($_POST['id']);

if($action == 'Envoyer'){
    if($_POST['lang'] ==  'francais')
        if(traductionAjoutFrancais($trad)) $_SESSION['envoi_reussie'] = 'La traduction a bien été ajoutée';
    else
        if(traductionAjoutAnglais($trad, $mot)) $_SESSION['envoi_reussie'] = 'La traduction a bien été ajoutée';
}

else if($action == 'Résoudre') {
    $_SESSION['request'] = '';
    $_SESSION['tradid'] = $_POST['id'];

    if(empty($_POST['fr'])) {
        $_SESSION['mot1'] = $_POST['en'];
        $_SESSION['selected'] = 'en';
    }
    else{
        $_SESSION['mot1'] = $_POST['fr'];
        $_SESSION['selected'] = 'fr';
    }
}

else if($action == 'Refuser') {
    traductionARefuser($id);
}

else if($_POST['action'] == 'Changer la traduction fr') {
    $_SESSION['request'] = '';
    $_SESSION['tradid'] = $_POST['id'];
    $_SESSION['mot1'] = $_POST['en'];
    $_SESSION['mot2'] = $_POST['fr'];
    $_SESSION['selected'] = 'en';
}
else if($action == 'Changer la traduction en') {
    $_SESSION['request'] = '';
    $_SESSION['tradid'] = $_POST['id'];
    $_SESSION['mot1'] = $_POST['fr'];
    $_SESSION['mot2'] = $_POST['en'];
    $_SESSION['selected'] = 'fr';

}
else if ($action == 'Supprimer') {
    traductionASupprimer($id);
}

else if($action == 'Valider') {
    $tradID = intval($_SESSION['tradid']);
    if ($_POST['lang'] == 'francais') {
        traductionAValiderAnglais($trad, $tradID);
    } else {
        traductionAValiderFrancais($trad, $tradID);
    }

}

else if ($action == 'Export') {
    $_SESSION['langexport'] = $_POST['langexport'];
    $filename = "../lang/" . $_POST['langexport'] . ".po";
    $handle = fopen($filename, 'w+');
    $header = "msgid \"\"
     msgstr \"\"
     \"Project-Id-Version: \\n\"
     \"POT-Creation-Date: \\n\"
     \"PO-Revision-Date: \\n\"
     \"Last-Translator: \\n\"
     \"Language-Team: \\n\"
     \"Language: " . $_POST['langexport'] . "\\n\"
     \"MIME-Version: 1.0\\n\"
     \"Content-Type: text/plain; charset=UTF-8\\n\"
     \"Content-Transfer-Encoding: 8bit\\n\"\n\n";
    fwrite($handle, $header);
    $traductions = traductionAExporter();
    while ($row = mysqli_fetch_assoc($traductions)) {
        if ($_POST['langexport'] == 'fr')
            $trad = 'msgid "' . $row['en'] . "\"\nmsgstr \"" . $row['fr'] . "\"\n\n";
        elseif ($_POST['langexport'] == 'en')
            $trad = 'msgid "' . $row['fr'] . "\"\nmsgstr \"" . $row['en'] . "\"\n\n";
        fwrite($handle, $trad);
    }
}

header("Location: pageTraducteurController.php$p");
exit();




>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf
