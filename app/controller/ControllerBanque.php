<!-- ----- début ControllerBanque -->

<?php
require_once '../model/ModelBanque.php';
require_once '../model/ModelCompte.php';

class ControllerBanque {

    // --- Affiche la liste des banques
    public static function banqueReadAll() {
        $results = ModelBanque::getAll();
        
        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/admin/banque/viewAll.php';
        if (DEBUG)
            echo ("ControllerBanque : banqueReadAll : vue = $vue");
        require ($vue);
    }

    // --- Affiche un formulaire pour sélectionner un label qui existe
    public static function banqueReadLabel() {
        $results = ModelBanque::getAllLabel();

        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/admin/banque/viewLabel.php';
        if (DEBUG)
            echo ("ControllerBanque : banqueReadLabel : vue = $vue");
        require ($vue);
    }

    // --- Affiche les comptes d'une banque grâce à son label
    public static function banqueReadOne() {
        $banque_label = $_GET['label'];
        $results = ModelCompte::getOne($banque_label);

        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/admin/banque/viewCompte.php';
        if (DEBUG)
            echo ("ControllerBanque : banqueReadOne : vue = $vue");
        require ($vue);
    }

    // --- Affiche un formulaire pour récupérer les informations d'une nouvelle banque
    public static function banqueCreate() {
        
        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/admin/banque/viewInsert.php';
        if (DEBUG)
            echo ("ControllerBanque : banqueCreate : vue = $vue");
        require ($vue);
    }
    
    // --- Ajoute une banque à la BD et affiche un message de confirmation
    // --- La clé est gérée par le systeme et pas par l'internaute
    public static function banqueCreated() {
        // ajouter une validation des informations du formulaire
        $results = ModelBanque::insert(
                        htmlspecialchars($_GET['label']), htmlspecialchars($_GET['pays'])
        );
        
        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/admin/banque/viewInserted.php';
        if (DEBUG)
            echo ("ControllerBanque : banqueCreated : vue = $vue");
        require ($vue);
    }
}
?>

<!-- ----- fin ControllerBanque -->
