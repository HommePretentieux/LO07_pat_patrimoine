<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelResidence.php';

class ControllerCompte {

    // --- Liste des banques
    public static function compteReadAllFromClient() {
        //$p_username = $_GET['login'];
        $results = ModelCompte::getAllFromClient('beatrice');
        // ----- Construction chemin de la vue
        include '../../../config.php';
        $vue = $root . '/app/view/client/compte/viewAllCompteClient.php';
        if (DEBUG)
            echo ("ControllerClient : compteReadAllFromClient : vue = $vue");
        require ($vue);
    }
    
    public static function compteCreate() {
        $results = ModelCompte::getAllLabel();
        // ----- Construction chemin de la vue
        include '../../../config.php';
        $vue = $root . '/app/view/client/compte/viewInsert.php';
        require ($vue);
    }

    // Affiche un formulaire pour récupérer les informations d'un nouveau vin.
    // La clé est gérée par le systeme et pas par l'internaute
    public static function compteCreated() {
        // ajouter une validation des informations du formulaire
        $results = ModelCompte::insert(
                        htmlspecialchars($_GET['label']), $_GET['montant'], htmlspecialchars($_GET['banque']), 'beatrice'
                );
        
        $banque=ModelCompte::getOneLabel($_GET['banque']);
        // ----- Construction chemin de la vue
        include '../../../config.php';
        $vue = $root . '/app/view/client/compte/viewInserted.php';
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerVin -->
