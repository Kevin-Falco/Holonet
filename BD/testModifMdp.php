<?php
    session_start();

    $action = $_POST['action'];

    if($action == 'Valider')
    {
        $ancien_mdp= $_POST['ancien_mdp'];
        $nouveau_mdp = $_POST['nouveau_mdp'];
        $verif_nouveau_mdp= $_POST['verif_nouveau_mdp'];

        $dbHost = 'mysql-bestsithever.alwaysdata.net';
        $dbLogin = '149556_holoadmin';
        $dbPass = 'kyloben';

        $dbBd = 'bestsithever_holocron';

        $dbLink = mysqli_connect($dbHost, $dbLogin, $dbPass)
        or die('Erreur de connexion dans la base : ' . mysqli_error($dbLink));

        mysqli_select_db($dbLink, $dbBd)
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

        if($verif_nouveau_mdp != $nouveau_mdp)
        {
            header('Location: modifMdp.php?step=ERROR_VERIF');
            exit;
        }
        else if($nouveau_mdp == $ancien_mdp)
        {
            header('Location: modifMdp.php?step=ERROR_ANCIEN');
            exit;
        }

        $query = 'SELECT * FROM user WHERE email = ' . '\'' . $_SESSION['email'] . '\'';

        if(!$dbResult = mysqli_query($dbLink, $query))
        {
            echo 'Erreur dela requête<br/>';
            //Type erreur
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            //Affiche requête envoyée
            echo 'Requête : ' . $query . '<br/>';
            exit();

        }
        else
        {

            if ($dbRow = mysqli_fetch_assoc($dbResult))
            {

                if (md5($ancien_mdp) == $dbRow['motdepasse'])
                {
                    $query = 'UPDATE user SET motdepasse = ' . '\'' . md5($nouveau_mdp) . '\'' .' WHERE email = ' . '\'' . $_SESSION['email'] . '\'';


                    if(!$dbResult = mysqli_query($dbLink, $query))
                    {
                        echo 'Erreur dela requête<br/>';
                        //Type erreur
                        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                        //Affiche requête envoyée
                        echo 'Requête : ' . $query . '<br/>';
                        exit();
                    }
                    else
                    {
                        header('Location: profil.php?step=MODIF_MDP');
                        exit;
                    }
                }
                else
                {
                    header('Location: modifMdp.php?step=MDP_INCORRECT');
                    exit;
                }
            }
        }
    }

?>