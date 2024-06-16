<!-- ----- début ModelBanque -->

<?php
require_once 'Model.php';

class ModelBanque {
    private $id, $label, $pays;

    // Pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $label = NULL, $pays = NULL) {
        // Valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
            $this->pays = $pays;
        }
    }

    function setId($id) {
        $this->id = $id;
    }
    function setLabel($label) {
        $this->label = $label;
    }
    function setPays($pays) {
        $this->pays = $pays;
    }

    function getId() {
        return $this->id;
    }
    function getLabel() {
        return $this->label;
    }
    function getPays() {
        return $this->pays;
    }

    // Retourne un array contenant toutes les banques de la BD
    public static function getAll() {
        try {
            $database = Model::getInstance();
            
            // Recherche des banques inscrites dans la BD
            $query = "select * from banque";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelBanque");
            return $results;
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Insert une nouvelle banque avec les données entrées dans le formulaire, retourne l'id de cette nouvelle banque 
    public static function insert($label, $pays) {
        try {
            $database = Model::getInstance();

            // Recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from banque";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // Ajout d'un nouveau tuple
            $query = "insert into banque value (:id, :label, :pays)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'label' => $label,
                'pays' => $pays
            ]);
            return $id;
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    
    // Retourne le label d'une banque à partir de son id
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
}
?>

<!-- ----- fin ModelBanque -->
