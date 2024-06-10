
<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerBanque.php');
require ('../controller/ControllerClient.php');
require ('../controller/ControllerCompte.php');
require ('../controller/ControllerPersonne.php');
require ('../controller/ControllerResidence.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// --- Liste des méthodes autorisées
switch ($action) {
    case "banqueReadAll" :
    case "banqueReadOne" :
    case "banqueReadLabel" :
    case "banqueCreate" :
    case "banqueCreated" :
        ControllerBanque::$action();
        break;
    case "connect" :
    case "connected" :
        ControllerPersonne::$action();
        break;
    case "clientReadAll" :
    case "adminReadAll" :
    case "compteReadAll" :
    case "residenceReadAll" :
        ControllerClient::$action();
        break;
    case "compteReadAll" :
    case "compteReadAllFromClient" :
    case "compteCreate" :
    case "compteCreated" :
    case "compteTransfert" :
    case "compteTransferred" :
        ControllerCompte::$action();
        break;
    case "readAllResidence" :
    case "readAllOtherResidence":
    case "ReadOneResidence":
    case "BoughtResidence":
        ControllerResidence::$action();
        break;

    // Tache par défaut
    default:
        $action = "accueil";
        ControllerBanque::$action();
}
?>
<!-- ----- Fin Router1 -->

