<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelCompte.php';

class ControllerPersonne {
 // --- page d'acceuil admin
    public static function connect() {
  include '../../../config.php';
  echo $root;
  $vue = $root . '/app/view/personne/viewConnect.php';
  if (DEBUG)
   echo ("ControllerBanque : adminAccueil : vue = $vue");
  require ($vue);
 }
 
     public static function connected() {
  include '../../../config.php';
  $login=$_GET['login'];
  $mdp=$_GET['mdp'];
  $results= ModelPersonne::tryConnect($login, $mdp);
  echo $root;
  $vue = $root . '/app/view/personne/viewConnect.php';
  if (DEBUG)
   echo ("ControllerBanque : adminAccueil : vue = $vue");
  require ($vue);
 }
 
 public static function adminAccueil() {
  include '../../../config.php';
  echo $root;
  $vue = $root . '/app/view/viewAdminAccueil.php';
  if (DEBUG)
   echo ("ControllerBanque : adminAccueil : vue = $vue");
  require ($vue);
 }

 // --- Liste des banques
 public static function banqueReadAll() {
  $results = ModelBanque::getAll();
  // ----- Construction chemin de la vue
  include '../../../config.php';
  $vue = $root . '/app/view/banque/viewAll.php';
  if (DEBUG)
   echo ("ControllerAdmin : banqueReadAll : vue = $vue");
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un label qui existe
 public static function banqueReadLabel() {
  $results = ModelBanque::getAllLabel();

  // ----- Construction chemin de la vue
  include '../../../config.php';
  $vue = $root . '/app/view/banque/viewLabel.php';
  require ($vue);
 }

 // Affiche un vin particulier (id)
 public static function banqueReadOne() {
  $banque_label = $_GET['label'];
  $results = ModelCompte::getOne($banque_label);

  // ----- Construction chemin de la vue
  include '../../../config.php';
  $vue = $root . '/app/view/banque/viewCompte.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un vin
 public static function banqueCreate() {
  // ----- Construction chemin de la vue
  include '../../../config.php';
  $vue = $root . '/app/view/banque/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau vin.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function banqueCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelBanque::insert(
      htmlspecialchars($_GET['label']), htmlspecialchars($_GET['pays'])
  );
  // ----- Construction chemin de la vue
  include '../../../config.php';
  $vue = $root . '/app/view/banque/viewInserted.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerVin -->
