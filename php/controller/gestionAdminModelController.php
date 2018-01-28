<<<<<<< HEAD:php/controller/gestionAdminModelController.php
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
=======
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
>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf:php/controller/gestionAdminModelController.php
}