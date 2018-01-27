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

        $pseudo= $dbLink->real_escape_string ($_POST['pseudo']);
        $email= $dbLink->real_escape_string ($_POST['email']);
        $mdp= $dbLink->real_escape_string (md5($_POST['mdp']));
        $verifmdp= $dbLink->real_escape_string (md5($_POST['verifmdp']));
        $status= $dbLink->real_escape_string ($_POST['status']);

        $code = intval(mt_rand(0, 999999999));

        $query = 'SELECT * FROM user WHERE email = ' . '\'' . $email . '\'';
        $dbResult = mysqli_query($dbLink, $query);

        if($dbRow = mysqli_fetch_assoc($dbResult)) {
            if($email == $dbRow['email']) {
                header('Location: inscription.php?step=EMAIL_EXIST');
                exit;
            }
        }

        if($verifmdp != $mdp) {
            header('Location: inscription.php?step=BAD_MDP');
            exit;
        }

        $query = 'INSERT INTO user (pseudo, email, motdepasse, categorie, code, valider) VALUES (\'' . $pseudo . '\', \'' . $email . '\', \'' . $mdp . '\',\'' . $status . '\', ' . $code . ', ' . 0  . ')';
        $dbResult = mysqli_query($dbLink, $query);

        $message = 'Voici le code pour finaliser votre inscription : ' . PHP_EOL;
        $message .= $code . PHP_EOL;
        mail($email, "Code d'activation",$message);

        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['email'] = $email;
        $_SESSION['mdp'] = $mdp;
        header('Location: validationInscription.php');
        exit;
    }
?>