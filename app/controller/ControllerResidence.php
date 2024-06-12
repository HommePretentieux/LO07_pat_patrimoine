<?php
require_once '../model/ModelResidence.php';

class ControllerResidence {

    public static function readAllResidence() {
        $id=$_SESSION['id'];
        $results=ModelResidence::getAllFromClient($id);
        // ----- Construction chemin de la vue
        include '../../../config.php';
        $vue = $root . '/app/view/client/residence/viewAll.php';
        if (DEBUG)
            echo ("ControllerResidence : readAllResidence : vue = $vue");
        require ($vue);
    }
    
    public static function readAllOtherResidence() {
        $id=$_SESSION['id'];
        $results=ModelResidence::getAllFromOther($id);
        // ----- Construction chemin de la vue
        include '../../../config.php';
        $vue = $root . '/app/view/client/residence/viewAllOther.php';
        if (DEBUG)
            echo ("ControllerResidence : readAllResidence : vue = $vue");
        require ($vue);
    }
    
    public static function ReadOneResidence() {
        $acheteur_id = $_SESSION['id'];
        $compte_acheteur = ModelCompte::getAll2($acheteur_id);
        
        $residence_label = $_GET['label'];
        
        $vendeur_id = ModelResidence::getVendeurId($residence_label);
        $compte_vendeur = ModelCompte::getAll2($vendeur_id[0]);
        
        $residence_prix = ModelResidence::getPrixResidence($residence_label);
        // ----- Construction chemin de la vue
        include '../../../config.php';
        $vue = $root . '/app/view/client/residence/viewAchat.php';
        require ($vue);
    }
    
    public static function BoughtResidence() {
        $residence_label = $_GET["label"];
        $prix = $_GET["prix"];
        $acheteur = $_GET["acheteur"];
        $vendeur = $_GET["vendeur"];
        $acheteur_id=$_SESSION["id"];
        ModelCompte::makeTransfert($acheteur, $vendeur, $prix);
        
        ModelResidence::buyOne($acheteur_id, $residence_label);

        // ----- Construction chemin de la vue
        include '../../../config.php';
        $vue = $root . '/app/view/client/residence/viewAchete.php';
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerVin -->
