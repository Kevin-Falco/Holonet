<?php
require('../model/trad.php');
require('utils.inc.php');
require('../model/gestionAdmin.php');

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

    require('gestion_utilisateursModelController.php');
}