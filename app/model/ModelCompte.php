<!-- ----- début ModelCompte -->

<?php
require_once 'Model.php';

class ModelCompte {
    private $id, $label, $montant, $banque_id, $personne_id;

    // Pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $label = NULL, $montant = NULL, $banque_id = NULL, $personne_id = NULL) {
        // Valeurs nulles si pas de passage de parametres
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

    // Retourne les comptes d'une banque à partir de à son id, complétés avec leur foreign keys
    public static function getSome($id) {
        try {
            $database = Model::getInstance();
            $query = "select p.prenom, p.nom, b.label, c.label, c.montant from compte as c, banque as b, personne as p where c.banque_id = b.id and c.personne_id=p.id and b.id=:id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_NUM);
            return $results;
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Retourne un array contenant tous les comptes inscrits dans la BD, complétés grâce à leurs foreign keys
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

    // Retourne un array contenant tous les comptes d'un client à partir de son id
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

    // Retourne un array contenant tous les comptes (leur banque et leur pays aussi) d'un client à partir de son id
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

    // Insert un nouveau compte avec les données entrées dans le formulaire, retourne son label et son montant  
    public static function insert($label, $montant, $b_id, $p_id) {
        try {
            $database = Model::getInstance();

            // Recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from compte";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // Ajout d'un nouveau tuple;
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
            return array($label, $montant);
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    // Change le montant de 2 comptes (ce qui est enlevé à l'un est ajouté à l'autre)
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
}
?>

<!-- ----- fin ModelCompte -->
