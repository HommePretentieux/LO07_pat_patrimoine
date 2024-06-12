<?php
require_once '../model/ModelCompte.php';
require_once '../model/ModelResidence.php';

class ControllerPatrimoine {

    public static function patrimoineReadAll(){
        $id=$_SESSION['id'];
        $comptes = ModelCompte::getAll2($id);
        $resid = ModelResidence::getAllFromClient($id);
        // ----- Construction chemin de la vue
        include '../../../config.php';
        $vue = $root . '/app/view/client/patrimoine/viewAll.php';
        if (DEBUG)
            echo ("ControllerAdmin : banqueReadAll : vue = $vue");
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerBanque -->
