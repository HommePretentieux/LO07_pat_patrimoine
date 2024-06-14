<!-- ----- début ControllerCompte -->

<?php
require_once '../model/ModelCompte.php';

class ControllerCompte {

    // --- Affiche les comptes de l'utilisateur deux fois pour qu'il puisse transférer de l'argent d'un compte à l'autre
    public static function compteTransfert() {
        $id = $_SESSION['id'];
        $results = ModelCompte::getAll2($id);
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/compte/viewTransfert.php';
        if (DEBUG)
            echo ("ControllerCompte : compteTransfert : vue = $vue");
        require ($vue);
    }

    // --- Transfert l'argent d'un compte à l'autre et affiche un message de confirmation
    public static function compteTransferred() {
        $montant = $_GET["montant"];
        $banque1 = $_GET["banque1"];
        $banque2 = $_GET["banque2"];
        ModelCompte::makeTransfert($banque1, $banque2, $montant);
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/compte/viewTransferred.php';
        if (DEBUG)
            echo ("ControllerCompte : compteTransferred : vue = $vue");
        require ($vue);
    }

    // --- Affiche la liste des comptes du client grâce à son id
    public static function compteReadAllFromClient() {
        $results = ModelCompte::getAllFromClient($_SESSION['id']);
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/compte/viewAllCompteClient.php';
        if (DEBUG)
            echo ("ControllerClient : compteReadAllFromClient : vue = $vue");
        require ($vue);
    }

    // --- Affiche un formulaire pour récupérer les informations d'un nouveau compte
    public static function compteCreate() {
        $results = ModelCompte::getAllLabel();
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/compte/viewInsert.php';
        if (DEBUG)
            echo ("ControllerCompte : compteCreate : vue = $vue");
        require ($vue);
    }

    // --- Ajoute un compte à la BD et affiche un message de confirmation
    // La clé est gérée par le systeme et pas par l'internaute
    public static function compteCreated() {
        // ajouter une validation des informations du formulaire
        $results = ModelCompte::insert(
                        htmlspecialchars($_GET['label']), $_GET['montant'], htmlspecialchars($_GET['banque']), $_SESSION['id']
        );
        $banque = ModelCompte::getOneLabel($_GET['banque']);
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/compte/viewInserted.php';
        if (DEBUG)
            echo ("ControllerCompte : compteCreated : vue = $vue");
        require ($vue);
    }
    
    // --- Affiche la liste des compte du client grâce à son id
    public static function compteChoix() {
        $id=$_SESSION['id'];
        $results = ModelCompte::getAll2($id);
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/innovations/viewCompte.php';
        if (DEBUG)
            echo ("ControllerCompte : compteChoix : vue = $vue");
        require ($vue);
    }
}
?>

<!-- ----- fin ControllerCompte -->
