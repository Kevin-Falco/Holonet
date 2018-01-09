<?php
/**
 * Created by PhpStorm.
 * User: h16005719
 * Date: 09/01/18
 * Time: 11:22
 */
$a_z = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$mdp = '0'.$a_z[rand(0,51)].rand(0,9).rand(0,9).$a_z[rand(0,51)].rand(0,9).rand(0,9).$a_z[rand(0,51)].rand(0,9);
mail($_POST['email'], 'Mot de passe oublié', ' voici votre nouveau mot de passe : '.$mdp);

if($dbRow = mysqli_fetch_assoc($dbResult))
{
    if ($mdp == $dbRow['motdepasse'])
    {
        $_SESSION['login'] = 'ok';
        $_SESSION['identifiant'] = $identifiant;
        $_SESSION['mdp'] = $mdp;

        $query = 'UPDATE user set nombreconnexions = nombreconnexions + 1 WHERE identifiant = ' . '\'' . $identifiant . '\'';

        if(!$dbResult = mysqli_query($dbLink, $query))
        {
            echo 'Erreur dela requête<br/>';
            //Type erreur
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            //Affiche requête envoyée
            echo 'Requête : ' . $query . '<br/>';
            exit();

        }

        end_page();
        header('Location: pageSession.php');
    }
    else
    {
        end_page();
        header('Location: login.php?step=ERROR');
    }
}