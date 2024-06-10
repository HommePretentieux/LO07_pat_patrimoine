<?php
require_once '../model/ModelResidence.php';

class ControllerResidence {

    public static function readAllResidence() {
        $id=$_SESSION['id'];
        $results=ModelResidence::getAll2($id);
        // ----- Construction chemin de la vue
        include '../../../config.php';
        $vue = $root . '/app/view/client/residence/viewAll.php';
        if (DEBUG)
            echo ("ControllerAdmin : banqueReadAll : vue = $vue");
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerVin -->
