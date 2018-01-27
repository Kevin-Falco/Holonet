<!-- Cette page a été traitée -->
<?php
    session_start();

    $action = $_POST['action'];

    if($action == 'connexion') {
        $dbHost = 'mysql-bestsithever.alwaysdata.net';
        $dbLogin = '149556_holoadmin';
        $dbPass = 'kyloben';

        $dbBd = 'bestsithever_holocron';

        $dbLink = mysqli_connect($dbHost, $dbLogin, $dbPass)
        or die('Erreur de connexion dans la base : ' . mysqli_error($dbLink));

        mysqli_select_db($dbLink, $dbBd)
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

        $email= $dbLink->real_escape_string ($_POST['email']);
        $mdp= $dbLink->real_escape_string (md5($_POST['mdp']));

        $query = 'SELECT * FROM user WHERE email = ' . '\'' . $email . '\'';

        $dbResult = mysqli_query($dbLink, $query);
        if (mysqli_num_rows($dbResult) == 0) {
            header('Location: connexion.php?step=ERROR_EMAIL');
            exit;
        }

        if($dbRow = mysqli_fetch_assoc($dbResult)) {
            if ($mdp == $dbRow['motdepasse']) {
                $_SESSION['pseudo'] = $dbRow['pseudo'];
                $_SESSION['email'] = $email;
                $_SESSION['mdp'] = $mdp;
                $_SESSION['categorie'] = $dbRow['categorie'];

                if($dbRow['valider']) {
                    header('Location: index.php');
                    exit;
                }
                else {
                    header('Location: validationInscription.php');
                    exit;
                }
            }
            else {
                header('Location: connexion.php?step=ERROR_MDP');
                exit;
            }
        }
    }
?>
