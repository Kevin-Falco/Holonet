<?php
include 'trad.php';
include 'utils.inc.php';

session_start();
debut_page();
?>

    <header>
        <!-- Vide -->
    </header>

<?php if (isset($_SESSION['pseudo'])) {

    if ($_SESSION['categorie'] == 'standard' || $_SESSION['categorie'] == 'premium' || $_SESSION['categorie'] == 'traducteur' || $_SESSION['categorie'] == 'admin') {

        barre_Navigation(3); //__FILE__

        if($_SESSION['login'] == 'ok') {
            echo 'Magecraft : ' . $_SESSION['pseudo'];
        }

        $dbHost = 'mysql-bestsithever.alwaysdata.net';
        $dbLogin = '149556_holoadmin';
        $dbPass = 'kyloben';

        $dbBd = 'bestsithever_holocron';

        $dbLink = mysqli_connect($dbHost, $dbLogin, $dbPass)
        or die('Erreur de connexion dans la base : ' . mysqli_error($dbLink));

        mysqli_select_db($dbLink, $dbBd)
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

        $query = 'SELECT email, categorie FROM user WHERE categorie != \'admin\';';

        if (!$query = mysqli_query($dbLink, $query)) {
            echo 'Erreur de la requête<br/>';
            //Type erreur
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            //Affiche requête envoyée
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
        else {
            echo '<table style="width:100%"><tr><th>Email</th><th>Categorie</th><th>Changement</th></tr> ';
            while ($dbRow = mysqli_fetch_assoc($query)) {
                echo '<tr>
                    <td>' . $dbRow['email'] . '</td>
                    <td>' . $dbRow['categorie'] . '</td>
                    <td>
                        <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégorie</button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Supprimer</a>
                            <a class="dropdown-item" href="#">Standard</a>
                            <a class="dropdown-item" href="#">Premium</a>
                            <a class="dropdown-item" href="#">Traducteur</a>
                          </div>
                        </div>
                    </td>
                 </tr>';
            }
            echo '</table>';
        }
    }
}
?>