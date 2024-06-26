<!-- ----- début ControllerResidence -->

<?php
require_once '../model/ModelResidence.php';
require_once '../model/ModelCompte.php';

class ControllerResidence {

    // --- Affiche toutes les résidences d'un client à partir de son id
    public static function residenceReadAllClient() {
        $id=$_SESSION['id'];
        $results = ModelResidence::getAllFromClient($id);
        
        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/residence/viewAll.php';
        if (DEBUG)
            echo ("ControllerResidence : residenceReadAll : vue = $vue");
        require ($vue);
    }
    
    // --- Affiche toutes les résidences n'appartenant pas à un client à partir de son id
    public static function residenceReadAllOther() {
        $id=$_SESSION['id'];
        $results=ModelResidence::getAllFromOther($id);
        
        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/residence/viewAllOther.php';
        if (DEBUG)
            echo ("ControllerResidence : residenceReadAllOther : vue = $vue");
        require ($vue);
    }
    
    // --- Affiche les comptes du client, ceux du vendeur, et le montant de la résidence qui va ête achetée
    public static function residenceReadOne() {
        $acheteur_id = $_SESSION['id'];
        $residence_label = $_GET['label'];
        
        $compte_acheteur = ModelCompte::getAllCompteClient($acheteur_id);
        
        $infos = ModelResidence::getInfos($residence_label);
        $compte_vendeur = ModelCompte::getAllCompteClient($infos['id']);
        $residence_prix = $infos['prix'];
        
        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/residence/viewAchat.php';
        if (DEBUG)
            echo ("ControllerResidence : residenceReadOne : vue = $vue");
        require ($vue);
    }
    
    // --- Transfert l'argent entre les 2 comptes, change le proprioétaire de la résidence et affiche un message de confirmation
    public static function residenceBought() {
        $residence_label = $_GET["label"];
        $prix = $_GET["prix"];
        $acheteur = $_GET["acheteur"];
        $vendeur = $_GET["vendeur"];
        $acheteur_id = $_SESSION["id"];
        
        ModelCompte::makeTransfert($acheteur, $vendeur, $prix);
        ModelResidence::buyOne($acheteur_id, $residence_label);

        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/residence/viewAchete.php';
        if (DEBUG)
            echo ("ControllerResidence : residenceBought : vue = $vue");
        require ($vue);
    }
    
    // --- Affiche toutes les résidences n'appartenant pas à un client et pouvant être acheté avec un certain compte
     public static function residenceAvail() {
        $id=$_SESSION['id'];
        $compte_id=$_GET['compte'];
        $results=ModelResidence::getAvailable($id, $compte_id);
        
        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/innovations/viewAllAvail.php';
        if (DEBUG)
            echo ("ControllerResidence : residenceAvail : vue = $vue");
        require ($vue);
    }
}
?>

<!-- ----- fin ControllerResidence -->
