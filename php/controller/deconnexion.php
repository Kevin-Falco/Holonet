<?php
session_start();
session_destroy();
require($_SERVER['DOCUMENT_ROOT'] . '/controller/connexionViewController.php');