<!-- Cette page a été traitée -->
<?php
    include 'utils.inc.php';

    $action = $_POST['action'];

    if($action == 'Valider') {
        $dbHost = 'mysql-bestsithever.alwaysdata.net';
        $dbLogin = '149556_holoadmin';
        $dbPass = 'kyloben';

        $dbBd = 'bestsithever_holocron';

        $dbLink = mysqli_connect($dbHost, $dbLogin, $dbPass)
        or die('Erreur de connexion dans la base : ' . mysqli_error($dbLink));

        mysqli_select_db($dbLink, $dbBd)
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

        $code= intval($_POST['code']);
        $email = $dbLink->real_escape_string ($_SESSION['email']);

        $query = 'SELECT * FROM user WHERE email = \'' . $email . '\'';

        $dbResult = mysqli_query($dbLink, $query);

        if($dbRow = mysqli_fetch_assoc($dbResult)) {
            if ($code == $dbRow['code']) {
                $query = 'UPDATE user set valider = 1 WHERE email = ' . '\'' . $email . '\'';
                mysqli_query($dbLink, $query);
                header('Location: verifCodeOk.php');
                exit;
            }
            else {
                header('Location: validationInscription.php?step=ERROR');
                exit;
            }
        }
    }
?>