<?php
    include 'utils.inc.php';

    session_start();
?>

<?php
    $pseudo= $_POST['pseudo'];
    $email= $_POST['email'];
    $mdp= $_POST['mdp'];
    $verifmdp= $_POST['verifmdp'];

    $code = rand(0, 999999999);


    $action = $_POST['action'];


    $dbHost = 'mysql-bestsithever.alwaysdata.net';
    $dbLogin = '149556_holoadmin';
    $dbPass = 'kyloben';

    $dbBd = 'bestsithever_holocron';

?>

<?php

    if($action == 'Valider')
    {
        if($verifmdp != $mdp) header('Location: inscription.php?step=BAD_MDP');

        $dbLink = mysqli_connect($dbHost, $dbLogin, $dbPass)
        or die('Erreur de connexion dans la base : ' . mysqli_error($dbLink));

        mysqli_select_db($dbLink, $dbBd)
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

        $query = 'SELECT * FROM user WHERE email = ' . '\'' . $email . '\'';

        if(!$dbResult = mysqli_query($dbLink, $query))
        {
            echo 'Erreur dela requête<br/>';
            //Type erreur
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            //Affiche requête envoyée
            echo 'Requête : ' . $query . '<br/>';
            exit();

        }

        if($query != null)
        {
            fin_page();
            header('Location: inscription.php?step=EMAIL_EXIST');
        }

        $query = 'INSERT INTO user (pseudo, email, motdepasse, code, valider) VALUES (\'' . $pseudo . '\', \'' . $email . '\', \'' . md5($mdp) . '\',' . $code . ', ' . 0  . ')';

        if(!$dbResult = mysqli_query($dbLink, $query))
        {
            echo 'Erreur dela requête<br/>';
            //Type erreur
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            //Affiche requête envoyée
            echo 'Requête : ' . $query . '<br/>';
            exit();

        }
        else
        {
            $message = 'Voici le code pour finaliser votre inscription : ' . PHP_EOL;
            $message .= $code . PHP_EOL;
            mail($email, "Code d'activation",$message);

            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['email'] = $email;
            $_SESSION['mdp'] = md5($mdp);
            header('Location: validationInscription.php');
        }
    }

?>