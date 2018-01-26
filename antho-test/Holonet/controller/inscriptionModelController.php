<?php
    require('utils.inc.php');
    require('../model/inscriptionModel.php');

    session_start();

    $pseudo= $_POST['pseudo'];
    $email= $_POST['email'];
    $mdp= md5($_POST['mdp']);
    $verifmdp= $_POST['verifmdp'];
    $status= $_POST['status'];

    if($verifmdp != $mdp)
    {
        header('Location: controller/inscriptionController.php?step=BAD_MDP');
        exit;
    }

    $dbRow = inscription_verifEmail($email);

    if ($email == $dbRow['email'])
    {
        header('Location: controller/inscriptionController.php?step=EMAIL_EXIST');
        exit;
    }

    $result = inscription_insert($pseudo, $email, $mdp, $status);

    if($result)
    {
        $message = 'Voici le code pour finaliser votre inscription : ' . PHP_EOL;
        $message .= $code . PHP_EOL;
        mail($email, "Code d'activation", $message);

        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['email'] = $email;
        $_SESSION['mdp'] = md5($mdp);
        header('Location: validationInscription.php');
        exit;
    }
    else
    {
        header('Location: inscriptionController.php');
        exit;
    }
