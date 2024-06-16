<!-- ----- début ControllerSite -->

<?php

class ControllerSite {

    // --- Affiche la page d'accueil général
    public static function accueil() {
        
        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/accueil/viewAccueil.php';
        if (DEBUG)
            echo ("ControllerSite : accueil : vue = $vue");
        require ($vue);
    }
    
    // --- Affiche la page d'accueil d'un administrateur
    public static function accueilAdmin() {
        
        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/accueil/viewAdminAccueil.php';
        if (DEBUG)
            echo ("ControllerSite : accueilAdmin : vue = $vue");
        require ($vue);
    }
    
    // --- Affiche la page d'accueil d'un client
    public static function accueilClient() {
        
        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/accueil/viewClientAccueil.php';
        if (DEBUG)
            echo ("ControllerSite : accueilClient : vue = $vue");
        require ($vue);
    }

    // --- Affiche un message d'avertissement pour une personne qui n'est pas un client (adminstrateur ou pas encore connecté)
    public static function pasClient() {
        
        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/innovations/viewPasClient.php';
        if (DEBUG)
            echo ("ControllerSite : pasClient : vue = $vue");
        require ($vue);
    }
    
    // --- Affiche une liste de propositions d'amélioration du code MVC
    public static function proposition() {
        
        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/innovations/viewProposition.php';
        if (DEBUG)
            echo ("ControllerSite : proposition : vue = $vue");
        require ($vue);
    }
}
?>

<!-- ----- fin ControllerSite -->

