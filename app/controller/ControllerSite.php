<?php

class ControllerSite {

    // --- Page d'accueil general
    public static function accueil() {
        include '../../../config.php';
        echo $root;
        $vue = $root . '/app/view/viewAccueil.php';
        echo ("ControllerBanque : adminAccueil : vue = $vue");
        require ($vue);
    }
    
    public static function accueilAdmin() {
        include '../../../config.php';
        echo $root;
        $vue = $root . '/app/view/viewAdminAccueil.php';
        echo ("ControllerBanque : adminAccueil : vue = $vue");
        require ($vue);
    }
    
    public static function accueilClient() {
        include '../../../config.php';
        echo $root;
        $vue = $root . '/app/view/viewClientAccueil.php';
        echo ("ControllerBanque : adminAccueil : vue = $vue");
        require ($vue);
    }

    public static function mesPropositions() {
        include 'config.php';
        $vue = $root . '/public/documentation/mesPropositions.php';
        require ($vue);
    }
}
?>

