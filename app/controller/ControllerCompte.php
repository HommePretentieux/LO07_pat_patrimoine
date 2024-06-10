<?php
require_once '../model/ModelBanque.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelPersonne.php';
require_once '../model/ModelResidence.php';

class ControllerCompte {

    // --- page d'acceuil admin
    // --- Liste des banques
    public static function CompteReadAll() {
        $results = ModelBanque::getAll();
        // ----- Construction chemin de la vue
        include '../../../config.php';
        $vue = $root . '/app/view/banque/viewAll.php';
        if (DEBUG)
            echo ("ControllerAdmin : banqueReadAll : vue = $vue");
        require ($vue);
    }

    public static function compteTransfert() {
        // ----- Construction chemin de la vue
        $id = $_SESSION['id'];
        $results = ModelCompte::getAll2($id);
        include '../../../config.php';
        $vue = $root . '/app/view/client/compte/viewTransfert.php';
        if (DEBUG)
            echo ("ControllerAdmin : banqueReadAll : vue = $vue");
        require ($vue);
    }

    public static function compteTransferred() {
        // ----- Construction chemin de la vue
        $montant = $_GET["montant"];
        $banque1 = $_GET["banque1"];
        $banque2 = $_GET["banque2"];
        ModelCompte::makeTransfert($banque1, $banque2, $montant);
        include '../../../config.php';
        $vue = $root . '/app/view/client/compte/viewTransferred.php';
        if (DEBUG)
            echo ("ControllerAdmin : banqueReadAll : vue = $vue");
        require ($vue);
    }

    // --- Liste des banques
    public static function compteReadAllFromClient() {
        //$p_username = $_GET['login'];
        $results = ModelCompte::getAllFromClient($_SESSION['id']);
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
                        htmlspecialchars($_GET['label']), $_GET['montant'], htmlspecialchars($_GET['banque']), $_SESSION['id']
        );

        $banque = ModelCompte::getOneLabel($_GET['banque']);
        // ----- Construction chemin de la vue
        include '../../../config.php';
        $vue = $root . '/app/view/client/compte/viewInserted.php';
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerVin -->
