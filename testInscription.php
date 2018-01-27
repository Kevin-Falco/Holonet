<!-- Cette page a été traitée -->
<?php
    session_start();

    $action = $_POST['action'];

    if($action == 'Valider') {
        $pseudo= $_POST['pseudo'];
        $email= $_POST['email'];
        $mdp= $_POST['mdp'];
        $verifmdp= $_POST['verifmdp'];
        $status= $_POST['status'];

        $code = mt_rand(0, 999999999);

        $dbHost = 'mysql-bestsithever.alwaysdata.net';
        $dbLogin = '149556_holoadmin';
        $dbPass = 'kyloben';

        $dbBd = 'bestsithever_holocron';

        $dbLink = mysqli_connect($dbHost, $dbLogin, $dbPass)
        or die('Erreur de connexion dans la base : ' . mysqli_error($dbLink));

        mysqli_select_db($dbLink, $dbBd)
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

        $query = 'SELECT * FROM user WHERE email = ' . '\'' . $email . '\'';
        $dbResult = mysqli_query($dbLink, $query);

        if($dbRow = mysqli_fetch_assoc($dbResult)) {
            if($email == $dbRow['email']) {
                header('Location: inscription.php?step=EMAIL_EXIST');
                exit;
            }
        }

        if($verifmdp != $mdp) {
            header('Location: ../pages/inscription.php?step=BAD_MDP');
            exit;
        }

        $query = 'INSERT INTO user (pseudo, email, motdepasse, categorie, code, valider) VALUES (\'' . $pseudo . '\', \'' . $email . '\', \'' . md5($mdp) . '\',\'' . $status . '\', ' . $code . ', ' . 0  . ')';
        $dbResult = mysqli_query($dbLink, $query);

        $message = 'Voici le code pour finaliser votre inscription : ' . PHP_EOL;
        $message .= $code . PHP_EOL;
        mail($email, "Code d'activation",$message);

        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['email'] = $email;
        $_SESSION['mdp'] = md5($mdp);
        header('Location: validationInscription.php');
        exit;
    }
?>