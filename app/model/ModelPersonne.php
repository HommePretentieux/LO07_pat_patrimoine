<!-- ----- debut ModelPersonne -->

<?php
require_once 'Model.php';

class ModelPersonne {
    private $id, $nom, $prenom, $statut, $login, $password;

    // pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $statut = NULL, $login = NULL, $password = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->statut = $statut;
            $this->login = $login;
            $this->password = $password;
        }
    }

    function setId($id) {
        $this->id = $id;
    }
    function setNom($nom) {
        $this->nom = $nom;
    }
    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }
    function setStatut($statut) {
        $this->statut = $statut;
    }
    function setLogin($login) {
        $this->login = $login;
    }
    function setPassword($password) {
        $this->password = $password;
    }

    function getId() {
        return $this->id;
    }
    function getNom() {
        return $this->nom;
    }
    function getPrenom() {
        return $this->prenom;
    }
    function getStatut() {
        return $this->statut;
    }
    function getLogin() {
        return $this->login;
    }
    function getPassword() {
        return $this->password;
    }

    // Vérifie que le nom d'utilisateur et le mot de passe donnés sont dans la BD
    public static function tryConnect($login, $mdp) {
        try {
            $database = Model::getInstance();
            $query = "select * from personne where login=:login and password=:mdp";
            $statement = $database->prepare($query);
            $statement->execute([
                'login' => $login,
                'mdp' => $mdp
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results;
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Insert un nouveau client avec les données entrées dans le formulaire, retourne la liste des nouvelles données de ce client  
    public static function insert($nom, $prenom, $login, $mdp) {
        try {
            $database = Model::getInstance();

            // Recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from personne";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // Ajout d'un nouveau tuple;
            $query = "INSERT INTO personne (id, nom, prenom, statut, login, password) 
          VALUES (:id, :nom, :prenom, 1, :login, :password)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'login' => $login,
                'password' => $mdp
            ]);
            return array($id, $nom, $prenom, $login, $mdp);
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    // Retourne un array contenant tous les clients de la BD
    public static function getAllClient() {
        try {
            $database = Model::getInstance();
            $query = "select nom, prenom, login, password from personne where statut = 1";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results;
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Retourne un array contenant tous les administrateurs de la BD
    public static function getAllAdmin() {
        try {
            $database = Model::getInstance();
            $query = "select nom, prenom, login, password from personne where statut = 0";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results;
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
}
?>

<!-- ----- fin ModelPersonne -->
