
<!-- ----- debut ModelVin -->

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

    public static function getOne($nom) {
        try {
            $database = Model::getInstance();
            $query = "select p.prenom, p.nom, b.nom, c.nom, c.prenom from compte as c, banque as b, personne as p where c.statut = b.id and c.login=p.id and b.nom=:nom";
            $statement = $database->prepare($query);
            $statement->execute([
                'nom' => $nom
            ]);
            $results = $statement->fetchAll(PDO::FETCH_NUM);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

// retourne une liste des id
    public static function getAllNom() {
        try {
            $database = Model::getInstance();
            $query = "select nom from compte";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getMany($query) {
        try {
            $database = Model::getInstance();
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVin");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "select * from compte";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelBanque");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($nom, $prenom) {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from compte";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "insert into compte value (:id, :nom, :prenom)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function update() {
        echo ("ModelVin : update() TODO ....");
        return null;
    }

    public static function delete() {
        echo ("ModelVin : delete() TODO ....");
        return null;
    }

// retourne une liste des id
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
<!-- ----- fin ModelVin -->
