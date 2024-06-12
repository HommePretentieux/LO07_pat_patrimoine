<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelCompte.php';
session_start();

class ControllerPersonne {

    // --- page d'acceuil admin
    public static function connect() {
        //include 'config.php';
        session_reset();
        include '../../../config.php';
        echo $root;
        $vue = $root . '/app/view/personne/viewConnect.php';
        if (DEBUG)
            echo ("ControllerBanque : adminAccueil : vue = $vue");
        require ($vue);
    }

    public static function connected() {
        $login = $_GET['login'];
        $mdp = $_GET['mdp'];
        $results = ModelPersonne::tryConnect($login, $mdp);
        include '../../../config.php';

        echo $root;
        if ($results) {
            $_SESSION['id'] = $results[0]->getId();
            $_SESSION['nom'] = $results[0]->getNom();
            $_SESSION['prenom'] = $results[0]->getPrenom();
            $_SESSION['statut'] = $results[0]->getStatut();
            if ($_SESSION['statut'] == 1) {
                $vue = $root . '/app/view/viewClientAccueil.php';
                require ($vue);
            } else if ($_SESSION['statut'] == 0) {
                $vue = $root . '/app/view/viewAdminAccueil.php';
                require ($vue);
            }
            if (DEBUG)
                echo ("ControllerBanque : adminAccueil : vue = $vue");
        } else {
            $vue = $root . '/app/view/personne/viewErrorConnect.php';
            if (DEBUG)
                echo ("ControllerBanque : adminAccueil : vue = $vue");
            require ($vue);
        }
    }

    public static function register() {
        //include 'config.php';
        session_reset();
        include '../../../config.php';
        echo $root;
        $vue = $root . '/app/view/personne/viewRegister.php';
        if (DEBUG)
            echo ("ControllerBanque : adminAccueil : vue = $vue");
        require ($vue);
    }

    public static function registered() {
        $results = ModelPersonne::insert(
                        htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['login']), htmlspecialchars($_GET['mdp'])
        );

        $id = $results[0];
        $nom = $results[1];
        $prenom = $results[2];
        $login = $results[3];
        $mdp = $results[4];

        session_unset();
        session_destroy();
        session_start();

        $_SESSION['id'] = $id;
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['login'] = $login;
        $_SESSION['mdp'] = $mdp;
        $_SESSION['statut'] = 1;

        include '../../../config.php';

        echo $root;
        $vue = $root . '/app/view/personne/viewRegistered.php';
        require ($vue);
    }
    
    public static function disconnect() {
        //include 'config.php';
        session_reset();
        include '../../../config.php';
        echo $root;
        $vue = $root . '/app/view/viewAccueil.php';
        if (DEBUG)
            echo ("ControllerBanque : adminAccueil : vue = $vue");
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerVin -->
