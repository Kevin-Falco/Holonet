<?php
require('../model/trad.php');
require('utils.inc.php');
require('../model/gestionUtilisateur.php');

session_start();

$affiche_utilisateurs = '<table style="width:100%"><tr><th>Email</th><th>Categorie</th><th>Changement</th></tr> ';


if (isset($_SESSION['pseudo']) && $_SESSION['categorie'] == 'admin')
{
    while($dbRow = affichageUtilisateurs())
    {
        {
            $affiche_utilisateurs .= '<tr>
                <td>' . $dbRow['email'] . '</td>
                <td>' . $dbRow['categorie'] . '</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégorie</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <form action="gestion_admin.php" method="post">
                                <input class="dropdown-item" type="submit" name="action" value="Supprimer"/>
                                <input class="dropdown-item" type="submit" name="action" value="Standard"/>
                                <input class="dropdown-item" type="submit" name="action" value="Premium"/>
                                <input class="dropdown-item" type="submit" name="action" value="Traducteur"/>
                                <input type="hidden" name="email" value="' . $dbRow['email'] . '"/>
                            </form>
                        </div>
                    </div>
                </td>
             </tr>';
        }
        echo '</table>';
    }
}

require('../view/gestionUtilisateurView.php');
