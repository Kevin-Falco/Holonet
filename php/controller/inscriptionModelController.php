<<<<<<< HEAD:php/controller/inscriptionModelController.php
<?php
    require('utils.inc.php');
    require($_SERVER['DOCUMENT_ROOT'] . '/model/inscriptionModel.php');

    session_start();

    $pseudo= $_POST['pseudo'];
    $email= $_POST['email'];
    $mdp= md5($_POST['mdp']);
    $verifmdp= md5($_POST['verifmdp']);
    $status= $_POST['status'];
    $code = intval(mt_rand(0, 999999999));

    if($verifmdp != $mdp)
    {
        header('Location: inscriptionController.php?step=BAD_MDP');
        exit;
    }

    $dbRow = inscription_verifEmail($email);

    if ($email == $dbRow['email'])
    {
        header('Location: inscriptionController.php?step=EMAIL_EXIST');
        exit;
    }

    if(inscription_insert($pseudo, $email, $mdp, $status, $code))
    {
        $message = 'Voici le code pour finaliser votre inscription : ' . PHP_EOL;
        $message .= $code . PHP_EOL;
        mail($email, "Code d'activation", $message);

        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['email'] = $email;
        $_SESSION['mdp'] = $mdp;
        header('Location: validationInscriptionController.php');
        exit;
    }
    else
    {
        header('Location: inscriptionController.php');
        exit;
    }
=======
<?php
    require('utils.inc.php');
    require($_SERVER['DOCUMENT_ROOT'] . '/model/inscriptionModel.php');

    session_start();

    $pseudo= $_POST['pseudo'];
    $email= $_POST['email'];
    $mdp= md5($_POST['mdp']);
    $verifmdp= md5($_POST['verifmdp']);
    $status= $_POST['status'];
    $code = intval(mt_rand(0, 999999999));

    if($verifmdp != $mdp)
    {
        header('Location: inscriptionController.php?step=BAD_MDP');
        exit;
    }

    $dbRow = inscription_verifEmail($email);

    if ($email == $dbRow['email'])
    {
        header('Location: inscriptionController.php?step=EMAIL_EXIST');
        exit;
    }

    if(inscription_insert($pseudo, $email, $mdp, $status, $code))
    {
        $message = 'Voici le code pour finaliser votre inscription : ' . PHP_EOL;
        $message .= $code . PHP_EOL;
        mail($email, "Code d'activation", $message);

        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['email'] = $email;
        $_SESSION['mdp'] = $mdp;
        header('Location: validationInscriptionController.php');
        exit;
    }
    else
    {
        header('Location: inscriptionController.php');
        exit;
    }
>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf:php/controller/inscriptionModelController.php
