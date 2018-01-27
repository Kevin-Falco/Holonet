<!-- Cette page a été traitée -->
<?php
    session_start();

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

        $ancien_mdp= $dbLink->real_escape_string (md5($_POST['ancien_mdp']));
        $nouveau_mdp = $dbLink->real_escape_string (md5($_POST['nouveau_mdp']));
        $verif_nouveau_mdp= md5($_POST['verif_nouveau_mdp']);

        $email = $dbLink->real_escape_string ($_SESSION['email']);

        if($verif_nouveau_mdp != $nouveau_mdp) {
            header('Location: modifMdp.php?step=ERROR_VERIF');
            exit;
        }
        else if($nouveau_mdp == $ancien_mdp) {
            header('Location: modifMdp.php?step=ERROR_ANCIEN');
            exit;
        }

        $query = 'SELECT * FROM user WHERE email = ' . '\'' . $email . '\'';
        $dbResult = mysqli_query($dbLink, $query);
        if ($dbRow = mysqli_fetch_assoc($dbResult)) {
            if ($ancien_mdp == $dbRow['motdepasse']) {
                $query = 'UPDATE user SET motdepasse = ' . '\'' . $nouveau_mdp . '\'' .' WHERE email = ' . '\'' . $email . '\'';
                mysqli_query($dbLink, $query);
                header('Location: profil.php?step=MODIF_MDP');
                exit;
            }
            else {
                header('Location: ../pages/modifMdp.php?step=MDP_INCORRECT');
                exit;
            }
        }
    }
?>