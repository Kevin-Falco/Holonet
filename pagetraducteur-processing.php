<?php
session_start();
if($_SESSION['categorie'] != 'premium' && $_SESSION['categorie'] != 'traducteur' && $_SESSION['categorie'] != 'admin' ){
    header('Location: page1.php');
    exit();
}

$dbHost = 'mysql-bestsithever.alwaysdata.net';
$dbLogin = '149556_holoadmin';
$dbPass = 'kyloben';

$dbBd = 'bestsithever_holocron';



$dbLink = mysqli_connect($dbHost, $dbLogin, $dbPass)
or die('Erreur de connexion dans la base : ' . mysqli_error($dbLink));

mysqli_select_db($dbLink, $dbBd)
or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

$trad = $dbLink->real_escape_string ($_POST['trad']);
$mot = $dbLink->real_escape_string ($_POST['mot']);
$id = intval($_POST['id']);

if($_POST['action'] == 'Envoyer'){
    if($_POST['lang'] ==  'francais')
        $query = 'INSERT INTO traduction (pseudo, fr, en, etat) 
        VALUES (\'N/D\', \'' . $trad .'\', \'' . $trad .'\', \'accepté\')';
    else
        $query = 'INSERT INTO traduction (pseudo, fr, en, etat) 
        VALUES (\'N/D\', \'' . $trad .'\', \'' . $mot .'\', \'accepté\')';

    if(!$dbResult = mysqli_query($dbLink, $query))
    {
        echo 'Erreur dela requête<br/>';
        //Type erreur
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        //Affiche requête envoyée
        echo 'Requête : ' . htmlspecialchars($query) . '<br/>';
        exit();
    }
    $_SESSION['envoi_reussie'] = 'La traduction a bien été ajoutée';
}
else if($_POST['action'] == 'Résoudre') {
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
else if($_POST['action'] == 'Refuser'){
    $query = 'UPDATE traduction SET etat = \'refusé\' WHERE id = \'' . $id . '\'';
    if(!($dbResult = mysqli_query($dbLink, $query)))
    {
        echo 'Erreur dans requête<br />';
        // Affiche le type d'erreur.
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        // Affiche la requête envoyée.
        echo 'Requête : ' . htmlspecialchars($query) . '<br/>';
        exit();
    }
}
else if($_POST['action'] == 'Changer la traduction fr'){
    $_SESSION['request'] = '';
    $_SESSION['tradid'] = $_POST['id'];
    $_SESSION['mot1'] = $_POST['en'];
    $_SESSION['mot2'] = $_POST['fr'];
    $_SESSION['selected'] = 'en';
}
else if($_POST['action'] == 'Changer la traduction en'){
    $_SESSION['request'] = '';
    $_SESSION['tradid'] = $_POST['id'];
    $_SESSION['mot1'] = $_POST['fr'];
    $_SESSION['mot2'] = $_POST['en'];
    $_SESSION['selected'] = 'fr';
}else if($_POST['action'] == 'Supprimer'){
    $query = 'DELETE FROM traduction WHERE id = \'' . $id . '\'';
    if(!($dbResult = mysqli_query($dbLink, $query)))
    {
        echo 'Erreur dans requête<br />';
        // Affiche le type d'erreur.
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        // Affiche la requête envoyée.
        echo 'Requête : ' . htmlspecialchars($query) . '<br/>';
        exit();
    }
}else if($_POST['action'] == 'Valider'){
    if($_POST['lang'] == 'francais'){
        $query = 'UPDATE traduction SET en = \'' . $trad . '\', etat=\'accepté\' WHERE id = \'' . intval($_SESSION['tradid']) . '\'';
    }
    else {
        $query = 'UPDATE traduction SET fr = \'' . $trad . '\', etat=\'accepté\' WHERE id = \'' . intval($_SESSION['tradid']) . '\'';
    }

    if(!($dbResult = mysqli_query($dbLink, $query)))
    {
        echo 'Erreur dans requête<br />';
        // Affiche le type d'erreur.
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        // Affiche la requête envoyée.
        echo 'Requête : ' . htmlspecialchars($query) . '<br/>';
        exit();
    }
}else if (($_POST['action'] == 'Export')){
    $_SESSION['langexport'] = $_POST['langexport'];
    $filename = "lang/" . $_POST['langexport'] . ".po";
    $handle = fopen($filename, 'w');
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
    fwrite ($handle, $header);
    $traductions = mysqli_query($dbLink, 'SELECT fr, en FROM traduction');
    while ($row = mysqli_fetch_assoc($traductions)){
        if ($_POST['langexport'] == 'fr')
            $trad = 'msgid "' . $row['en'] . "\"\nmsgstr \"" . $row['fr'] . "\"\n\n";
        elseif ($_POST['langexport'] == 'en')
            $trad = 'msgid "' . $row['fr'] . "\"\nmsgstr \"" . $row['en'] . "\"\n\n";
        fwrite ($handle, $trad);
    }
}

header('Location: pagetraducteur.php');
exit();
