<<<<<<< HEAD
<?php
require('trad.php');
require('utils.inc.php');
require('../model/page1Traduction.php');

session_start();

$mot= $_POST['mot'];
$langue= $_POST['lang'];

if (isset($_SESSION['lang'])) {
    $p = '?lang=' . $_SESSION['lang'];
}

if(isset($_COOKIE['tempotrad'])) {
    $_SESSION['non_connecté'] = 'Vous n\'etes pas connectés, vous êtes limité à une traduction toutes les 10 minutes';
    header("Location: page1Controller.php$p");
    exit();
}

if(!isset($_SESSION['categorie']))
    setcookie('tempotrad', '10 minutes', time() + 60*10);


if ($langue == 'francais')
    $dbResult = traductionFrançais($mot);
else
    $dbResult = traductionAnglais($mot);

if (mysqli_num_rows($dbResult) == 0) {
    $_SESSION['trad_sentence'] = 'Le mot demandé n\'a pas encore été traduit.';
    header("Location: page1Controller.php$p");
    exit();
}

if($dbRow = mysqli_fetch_assoc($dbResult)) {
    if ($langue == 'francais') {
        $_SESSION['trad_sentence'] = ' Le mot français ' . $mot . ' signifie ' . $dbRow['en'] . ' en anglais.';
        header("Location: page1Controller.php$p");
        exit();
    }
    else {
        $_SESSION['trad_sentence'] = ' Le mot anglais ' . $mot . ' signifie ' . $dbRow['fr'] . ' en français.';
        header("Location: page1Controller.php$p");
        exit();
    }
=======
<?php
require('trad.php');
require('utils.inc.php');
require('../model/page1Traduction.php');

session_start();

$mot= $_POST['mot'];
$langue= $_POST['lang'];

if (isset($_SESSION['lang'])) {
    $p = '?lang=' . $_SESSION['lang'];
}

if(isset($_COOKIE['tempotrad'])) {
    $_SESSION['non_connecté'] = 'Vous n\'etes pas connectés, vous êtes limité à une traduction toutes les 10 minutes';
    header("Location: page1Controller.php$p");
    exit();
}

if(!isset($_SESSION['categorie']))
    setcookie('tempotrad', '10 minutes', time() + 60*10);


if ($langue == 'francais')
    $dbResult = traductionFrançais($mot);
else
    $dbResult = traductionAnglais($mot);

if (mysqli_num_rows($dbResult) == 0) {
    $_SESSION['trad_sentence'] = 'Le mot demandé n\'a pas encore été traduit.';
    header("Location: page1Controller.php$p");
    exit();
}

if($dbRow = mysqli_fetch_assoc($dbResult)) {
    if ($langue == 'francais') {
        $_SESSION['trad_sentence'] = ' Le mot français ' . $mot . ' signifie ' . $dbRow['en'] . ' en anglais.';
        header("Location: page1Controller.php$p");
        exit();
    }
    else {
        $_SESSION['trad_sentence'] = ' Le mot anglais ' . $mot . ' signifie ' . $dbRow['fr'] . ' en français.';
        header("Location: page1Controller.php$p");
        exit();
    }
>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf
}