<!-- ----- début ControllerClient -->

<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelResidence.php';

class ControllerClient {

    // --- Affiche la liste des clients du site
    public static function clientReadAll() {
        $results = ModelPersonne::getAllClient();
        
        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/admin/client/viewAllClient.php';
        if (DEBUG)
            echo ("ControllerClient : clientReadAll : vue = $vue");
        require ($vue);
    }

    // --- Affiche la liste des aministrateurs du site
    public static function adminReadAll() {
        $results = ModelPersonne::getAllAdmin();

        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/admin/client/viewAllAdmin.php';
        if (DEBUG)
            echo ("ControllerClient : adminReadAll : vue = $vue");
        require ($vue);
    }

    // --- Affiche la liste de tous les comptes du site
    public static function compteReadAll() {
        $results = ModelCompte::getAll();

        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/admin/client/viewAllCompte.php';
        if (DEBUG)
            echo ("ControllerClient : compteReadAll : vue = $vue");
        require ($vue);
    }

    // --- Affiche la liste des residences d'un client
    public static function residenceReadAll() {
        $results = ModelResidence::getAll();

        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/admin/client/viewAllResidence.php';
        if (DEBUG)
            echo ("ControllerClient : residenceReadAll : vue = $vue");
        require ($vue);
    }
}
?>

<!-- ----- fin ControllerClient -->
