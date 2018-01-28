<?php
require ('trad.php');
require('utils.inc.php');
require ('../model/verificationCode.php');
require('../model/functions.php');

session_start();
$code= $_POST['code'];
$email = $_SESSION['email'];

$dbRow = getUserDataByEmail($email);

if(!isset($dbRow['email']))
{
    header('Location: validationInscriptionController.php?step=ERROR');
    exit;
}

if ($code == $dbRow['code'])
{
    if(validerUtilisateur($email))
    {
        $_SESSION['categorie'] = $dbRow['categorie'];
        require('verifCodeController.php');
    }
}
else
{
    header('Location: validationInscriptionController.php?step=ERROR');
    exit;
}