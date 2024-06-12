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

    public static function pasClient() {
        include 'config.php';
        $vue = $root . '/app/view/viewPasClient.php';
        require ($vue);
    }
    
    public static function proposition() {
        include 'config.php';
        $vue = $root . '/app/view/viewProposition.php';
        require ($vue);
    }
}
?>

