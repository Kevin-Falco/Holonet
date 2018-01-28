<<<<<<< HEAD:php/controller/connexionModelController.php
<?php
    require('utils.inc.php');
    require($_SERVER['DOCUMENT_ROOT'] . '/model/connexionModel.php');

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

    if ($mdp == $dbRow['motdepasse'])
    {
        $_SESSION['pseudo'] = $dbRow['pseudo'];
        $_SESSION['email'] = $email;
        $_SESSION['mdp'] = $mdp;
        $_SESSION['categorie'] = $dbRow['categorie'];

        if($dbRow['valider'])
        {
            setcookie('tempotrad', NULL, -1);
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


=======
<?php
    require('utils.inc.php');
    require($_SERVER['DOCUMENT_ROOT'] . '/model/connexionModel.php');

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

    if ($mdp == $dbRow['motdepasse'])
    {
        $_SESSION['pseudo'] = $dbRow['pseudo'];
        $_SESSION['email'] = $email;
        $_SESSION['mdp'] = $mdp;
        $_SESSION['categorie'] = $dbRow['categorie'];

        if($dbRow['valider'])
        {
            setcookie('tempotrad', NULL, -1);
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


>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf:php/controller/connexionModelController.php
