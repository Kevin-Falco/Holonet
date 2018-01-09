<?php
    include 'utils.inc.php';

    session_start();
    debut_page();
?>

<?php
    $pseudo= $_POST['pseudo'];
    $email= $_POST['email'];
    $mdp= $_POST['mdp'];
    $verifmdp= $_POST['verifmdp'];
    $code = rand(0, 9999999999);


    $action = $_POST['action'];


    $dbHost = 'mysql-bestsithever.alwaysdata.net';
    $dbLogin = '149556_holoadmin';
    $dbPass = 'kyloben';

    $dbBd = 'bestsithever_holocron';

?>

<?php

    if($action == 'Valider')
    {

        $dbLink = mysqli_connect($dbHost, $dbLogin, $dbPass)
        or die('Erreur de connexion dans la base : ' . mysqli_error($dbLink));

        mysqli_select_db($dbLink, $dbBd)
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));


        $query = 'INSERT INTO user (pseudo, email, motdepasse, code, valider) VALUES (\'' . $pseudo . '\', \'' . $email . '\', \'' . $mdp . '\',' . $code . ', ' . 0  . ')';


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
            mail($email, "Code d\'activation",$message);

            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            fin_page();
            header('Location: validationInscription.php');
        }
    }

    fin_page();
?>