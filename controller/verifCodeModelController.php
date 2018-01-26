<?php
require('utils.inc.php');
require ('../model/verificationCode.php');
require('../model/functions.php');

session_start();
$code= $_POST['code'];
$dbRow = getUserDataByEmail($_SESSION['email']);

if(isset($dbRow['email']))
{
    header('Location: validationInscriptionController.php?step=ERROR');
    exit;
}

if ($code == $dbRow['code'])
{
    if(verificationCode($_SESSION['email'])) require('verifCodeController.php');
}
else
{

}