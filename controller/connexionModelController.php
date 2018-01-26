<?php
    //Appel la fonction connexion(), récupère ce qu'elle trouve et regarde si tout est bon.

    require('utils.inc.php');
    require('../model/connexionModel.php');

    session_start();

    $action = $_POST['action'];

    $email = $_POST['email'];
    $mdp = md5($_POST['mdp']);

    $dbResult = connexion($email);

    if(mysqli_num_rows($dbResult) == 0)
    {
        header('Location: connexionViewController.php?step=ERROR_EMAIL');
        exit;
    }

    $dbRow = mysqli_fetch_assoc($dbResult);

    if (md5($mdp) == $dbRow['motdepasse'])
    {
        $_SESSION['pseudo'] = $dbRow['pseudo'];
        $_SESSION['email'] = $email;
        $_SESSION['mdp'] = md5($mdp);
        $_SESSION['categorie'] = $dbRow['categorie'];

        if($dbRow['valider'])
        {
            header('Location: index.php');
            exit;
        }
        else
        {
            header('Location: validationInscription.php');
            exit;
        }
    }
    else
    {
        header('Location: connexionViewController.php?step=ERROR_MDP');
        exit;
    }


