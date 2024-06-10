
<!-- ----- debut ModelVin -->

<?php
require_once 'Model.php';

class ModelCompte {

    private $id, $label, $montant, $banque_id, $personne_id;

    // pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $label = NULL, $montant = NULL, $banque_id = NULL, $personne_id = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
            $this->montant = $montant;
            $this->banque_id = $banque_id;
            $this->personne_id = $personne_id;
        }
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLabel($label) {
        $this->label = $label;
    }

    function setMontant($montant) {
        $this->montant = $montant;
    }

    function setBanqueID($banque_id) {
        $this->banque_id = $banque_id;
    }

    function setPersonneID($personne_id) {
        $this->personne_id = $personne_id;
    }

    function getId() {
        return $this->id;
    }

    function getLabel() {
        return $this->label;
    }

    function getMontant() {
        return $this->montant;
    }

    function getBanqueID() {
        return $this->banque_id;
    }

    function getPersonneID() {
        return $this->person;
    }

    public static function getOne($label) {
        try {
            $database = Model::getInstance();
            $query = "select p.prenom, p.nom, b.label, c.label, c.montant from compte as c, banque as b, personne as p where c.banque_id = b.id and c.personne_id=p.id and b.label=:label";
            $statement = $database->prepare($query);
            $statement->execute([
                'label' => $label
            ]);
            $results = $statement->fetchAll(PDO::FETCH_NUM);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "select p.nom, p.prenom, b.label, b.pays, c.label, c.montant from compte as c, banque as b, personne as p where c.banque_id = b.id and c.personne_id=p.id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_NUM);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAll2($id) {
        try {
            $database = Model::getInstance();
            $query = "select * FROM compte where personne_id=:id";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $id]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelCompte');
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAllFromClient($p_id) {
        try {
            $database = Model::getInstance();
            $query = "select b.label, b.pays, c.label, c.montant from compte as c, banque as b, personne as p where c.banque_id = b.id and c.personne_id=p.id and p.id=:personne_id;";
            $statement = $database->prepare($query);
            $statement->execute(['personne_id' => $p_id]);
            $results = $statement->fetchAll(PDO::FETCH_NUM);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAllLabel() {
        try {
            $database = Model::getInstance();
            $query = "select id, label from banque";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_NUM);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($label, $montant, $b_id, $p_id) {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from compte";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            /* $query = "SELECT DISTINCT id FROM personne WHERE login = :p_username";
              $statement = $database->prepare($query);
              $statement->execute(['p_username' => $p_username]);
              $result = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
              $p_id = $result[0]; */

            // ajout d'un nouveau tuple;
            $query = "INSERT INTO compte (id, label, montant, banque_id, personne_id) 
          VALUES (:id, :label, :montant, :banque_id, :personne_id)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'label' => $label,
                'montant' => $montant,
                'banque_id' => $b_id,
                'personne_id' => $p_id
            ]);
            return array($id, $label, $montant, $b_id, $p_id);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function getOneLabel($banque_id) {
        try {
            $database = Model::getInstance();
            $query = "select label from banque where id=:id";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $banque_id]);
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function makeTransfert($idFrom, $idTo, $montant) {
        try {
            $database = Model::getInstance();
            $query = "UPDATE `compte` SET montant = montant -:montant WHERE `id` = :idFrom";
            $statement = $database->prepare($query);
            $statement->execute(['montant' => $montant, 'idFrom' => $idFrom]);
            $query = "UPDATE `compte` SET montant = montant +:montant WHERE `id` = :idTo";
            $statement = $database->prepare($query);
            $statement->execute(['montant' => $montant, 'idTo' => $idTo]);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
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
}
?>
<!-- ----- fin ModelVin -->
