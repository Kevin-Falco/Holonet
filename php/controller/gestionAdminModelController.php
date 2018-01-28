<?php
require('trad.php');
require('utils.inc.php');
require($_SERVER['DOCUMENT_ROOT'] . '/model/gestionAdmin.php');

session_start();

if (isset($_SESSION['categorie']) && $_SESSION['categorie'] == 'admin')
{
    $action = $_POST['action'];
    $email = $_POST['email'];

    if($action == "Supprimer")
    {
        gestionAdminiSupprimer($email);
    }
    else
    {
        gestionAdminAutre($email, $action);
    }

    require($_SERVER['DOCUMENT_ROOT'] . '/controller/gestion_utilisateursModelController.php');
}