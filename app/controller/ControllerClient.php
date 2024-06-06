<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelResidence.php';

class ControllerClient {

 // --- Liste des banques
 public static function clientReadAll() {
  $results = ModelPersonne::getAllClient();
  // ----- Construction chemin de la vue
  include '../../../config.php';
  $vue = $root . '/app/view/admin/client/viewAllClient.php';
  if (DEBUG)
   echo ("ControllerClient : clientReadAll : vue = $vue");
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un label qui existe
 public static function adminReadAll() {
  $results = ModelPersonne::getAllAdmin();

  // ----- Construction chemin de la vue
  include '../../../config.php';
  $vue = $root . '/app/view/admin/client/viewAllAdmin.php';
  require ($vue);
 }

 // Affiche un vin particulier (id)
 public static function compteReadAll() {
  $results = ModelCompte::getAll();

  // ----- Construction chemin de la vue
  include '../../../config.php';
  $vue = $root . '/app/view/admin/client/viewAllCompte.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un vin
 public static function residenceReadAll() {
  $results = ModelResidence::getAll();

  // ----- Construction chemin de la vue
  include '../../../config.php';
  $vue = $root . '/app/view/admin/client/viewAllResidence.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerVin -->
