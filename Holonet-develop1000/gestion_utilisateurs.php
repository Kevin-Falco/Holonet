<!-- Cette page a été traitée -->
<?php
    include 'trad.php';
    include 'utils.inc.php';

    debut_page();

    if (isset($_SESSION['pseudo']) && $_SESSION['categorie'] == 'admin') {
        barre_Navigation(4);

        $dbHost = 'mysql-bestsithever.alwaysdata.net';
        $dbLogin = '149556_holoadmin';
        $dbPass = 'kyloben';

        $dbBd = 'bestsithever_holocron';

        $dbLink = mysqli_connect($dbHost, $dbLogin, $dbPass)
        or die('Erreur de connexion dans la base : ' . mysqli_error($dbLink));

        mysqli_select_db($dbLink, $dbBd)
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

        $query = 'SELECT email, categorie FROM user WHERE categorie != \'admin\';';
        echo '<table style="width:100%"><tr><th>Email</th><th>Categorie</th><th>Changement</th></tr> ';
        $dbResult = mysqli_query($dbLink, $query);
        while ($dbRow = mysqli_fetch_assoc($dbResult)) {
            echo '<tr>
                <td>' . htmlspecialchars($dbRow['email']) . '</td>
                <td>' . htmlspecialchars($dbRow['categorie']) . '</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégorie</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <form action="gestion_admin.php" method="post">
                                <input class="dropdown-item" type="submit" name="action" value="Supprimer"/>
                                <input class="dropdown-item" type="submit" name="action" value="Standard"/>
                                <input class="dropdown-item" type="submit" name="action" value="Premium"/>
                                <input class="dropdown-item" type="submit" name="action" value="Traducteur"/>
                                <input type="hidden" name="email" value="' . htmlspecialchars($dbRow['email']) . '"/>
                            </form>
                        </div>
                    </div>
                </td>
             </tr>';
        }
        echo '</table>';
    }
?>