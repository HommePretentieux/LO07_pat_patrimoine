
<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerBanque.php');

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
 case "compteReadAll" :
  ControllerCompte::$action();
  break;
 case "connect" :
  ControllerPersonne::$action();
  break;

 // Tache par défaut
 default:
  $action = "adminAccueil";
  ControllerBanque::$action();
}
?>
<!-- ----- Fin Router1 -->

