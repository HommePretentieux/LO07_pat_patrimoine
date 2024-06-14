<!-- ----- début ControllerPatrimoine -->

<?php
require_once '../model/ModelCompte.php';
require_once '../model/ModelResidence.php';

class ControllerPatrimoine {

    // ---Affiche un tableau contenant toutes les pocessions du client (comptes et résidence)
    public static function patrimoineReadAll(){
        $id=$_SESSION['id'];
        $comptes = ModelCompte::getAll2($id);
        $resid = ModelResidence::getAllFromClient($id);
        
        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/patrimoine/viewAll.php';
        if (DEBUG)
            echo ("ControllerPatrimoine : patrimoineReadAll : vue = $vue");
        require ($vue);
    }
}
?>

<!-- ----- fin ControllerPatrimoine -->
