<!-- Cette page a été traitée -->
<?php
    include 'trad.php';
    include 'utils.inc.php';

    session_start();

    if (isset($_SESSION['categorie']) && $_SESSION['categorie'] == 'admin') {
        $dbHost = 'mysql-bestsithever.alwaysdata.net';
        $dbLogin = '149556_holoadmin';
        $dbPass = 'kyloben';

        $dbBd = 'bestsithever_holocron';

        $dbLink = mysqli_connect($dbHost, $dbLogin, $dbPass)
        or die('Erreur de connexion dans la base : ' . mysqli_error($dbLink));

        mysqli_select_db($dbLink, $dbBd)
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

        $action = $dbLink->real_escape_string ($_POST['action']);
        $email = $dbLink->real_escape_string ($_POST['email']);

        if ($action == 'Supprimer') {
            $query = 'DELETE FROM user WHERE email = \'' . $email . '\'';
            mysqli_query($dbLink, $query);
        }
        else {
            $query = 'UPDATE user SET categorie = \'' . strtolower($action) . '\' WHERE email = \'' . $email . '\'';
            mysqli_query($dbLink, $query);
        }
        header('Location: gestion_utilisateurs.php');
        exit();
    }
?>