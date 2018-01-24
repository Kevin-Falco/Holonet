<?php
    require ('utils.inc.php');
    require ('../model/modifMdpModel.php');

    session_start();

    $ancien_mdp= md5($_POST['ancien_mdp']);
    $nouveau_mdp = md5($_POST['nouveau_mdp']);
    $verif_nouveau_mdp= md5($_POST['verif_nouveau_mdp']);

    if($verif_nouveau_mdp != $nouveau_mdp)
    {
        header('Location: modifMdpController.php?step=ERROR_VERIF');
        exit;
    }
    else if($nouveau_mdp == $ancien_mdp)
    {
        header('Location: modifMdpController.php?step=ERROR_ANCIEN');
        exit;
    }

    $dbRow = getUserDataByEmail($_SESSION['email']);

    if ($ancien_mdp == $dbRow['motdepasse'])
    {
        if(modifMdp($_SESSION['email'], $nouveau_mdp))
        {
            header('Location: profilController.php?step=MODIF_MDP');
            exit;
        }
    }
    else
    {
        header('Location: modifMdpController.php?step=MDP_INCORRECT');
        exit;
    }