<!-- ----- début ControllerPersonne -->

<?php
require_once '../model/ModelPersonne.php';
session_start();

class ControllerPersonne {

    // --- Affiche un formulaire pour récupérer les informations de l'utilisateur
    public static function connect() {
        session_reset();
        
        // ----- Construction du chemin de la vue
        include 'config.php';
        echo $root;
        $vue = $root . '/app/view/personne/viewConnect.php';
        if (DEBUG)
            echo ("ControllerPersonne : connect : vue = $vue");
        require ($vue);
    }

    // --- Met à jour les variables de session et affiche la page d'accueil de l'utilisateur selon son statut
    public static function connected() {
        $login = $_GET['login'];
        $mdp = $_GET['mdp'];
        $results = ModelPersonne::tryConnect($login, $mdp);
        
        // ----- Construction du chemin de la vue
        include 'config.php';
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
                echo ("ControllerPersonne : connected : vue = $vue");
        } else {
            $vue = $root . '/app/view/personne/viewErrorConnect.php';
            if (DEBUG)
                echo ("ControllerPersonne : connected : vue = $vue");
            require ($vue);
        }
    }

    // --- Affiche un formulaire pour récupérer les informations d'un nouveau client
    public static function register() {
        session_reset();
        
        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/personne/viewRegister.php';
        if (DEBUG)
            echo ("ControllerPersonne : register : vue = $vue");
        require ($vue);
    }

    // --- Ajoute un client à la BD, met à jour les variables de session et affiche une page d'accueil
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

        
        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/personne/viewRegistered.php';
        if (DEBUG)
            echo ("ControllerPersonne : registered : vue = $vue");
        require ($vue);
    }

    // --- Déconnecte l'utilisateur et reviens à la page d'accueil général
    public static function disconnect() {
        session_reset();
        
        // ----- Construction du chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/viewAccueil.php';
        if (DEBUG)
            echo ("ControllerPersonne : disconnect : vue = $vue");
        require ($vue);
    }
}
?>

<!-- ----- fin ControllerPersonne -->
