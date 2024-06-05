
<!-- ----- debut ModelVin -->

<?php
require_once 'Model.php';

class ModelResidence {

    private $id, $label, $ville, $prix, $personne_id;

    // pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $label = NULL, $ville = NULL, $prix = NULL, $personne_id = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
            $this->ville = $ville;
            $this->prix = $prix;
            $this->prsonne_id = $personne_id;
        }
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLabel($label) {
        $this->label = $label;
    }

    function setVille($ville) {
        $this->ville = $ville;
    }

    function setPrix($prix) {
        $this->prix = $prix;
    }

    function setPersonne_id($personne_id) {
        $this->personne_id = $personne_id;
    }

    function getId() {
        return $this->id;
    }

    function getLabel() {
        return $this->label;
    }

    function getVille() {
        return $this->ville;
    }

    function getPrix() {
        return $this->prix;
    }

    function getPersonne_id() {
        return $this->personne_id;
    }

// retourne une liste des id
    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "select p.nom, p.prenom, r.label, r.ville, r.prix from residence as r, personne as p where r.personne_id=p.id order by r.prix;";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_NUM);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAllAdmin() {
        try {
            $database = Model::getInstance();
            $query = "select label, ville, personne_id, password from personne where prix = 0";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($label, $ville) {
        try {
            $database = Model::getInstance();

// recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from banque";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

// ajout d'un nouveau tuple;
            $query = "insert into banque value (:id, :label, :ville)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'label' => $label,
                'ville' => $ville
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
}
?>
<!-- ----- fin ModelVin -->
