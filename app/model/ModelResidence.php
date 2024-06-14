<!-- ----- debut ModelResidence -->

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

    // Retourne un array contenant toutes les résidences inscrites dans la BD, complétées grâce à leurs foreign keys
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
    
    // Retourne un array contenant toutes les résidences appartenant à un client à patir de son id
    public static function getAllFromClient($p_id) {
        try {
            $database = Model::getInstance();
            $query = "select r.label, r.ville, r.prix from residence as r, personne as p where r.personne_id=p.id and p.id=:personne_id order by r.prix;";
            $statement = $database->prepare($query);
            $statement->execute(['personne_id' => $p_id]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelResidence');
            return $results;
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    // Retourne un array contenant toutes les réseidence n'appartenant PAS à un client à partir de son id
    public static function getAllFromOther($p_id) {
        try {
            $database = Model::getInstance();
            $query = "select r.id, r.label, r.ville, r.prix, r.personne_id from residence as r, personne as p where r.personne_id=p.id and p.id!=:personne_id order by r.label";
            $statement = $database->prepare($query);
            $statement->execute(['personne_id' => $p_id]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelResidence');
            return $results;
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    // Retourne l'id du vendeur et le prix de la résidence à partir de son label
    public static function getInfos($r_label) {
        try {
            $database = Model::getInstance();
            $query = "select p.id, r.prix from residence as r, personne as p where r.personne_id=p.id and r.id=:residence_label";
            $statement = $database->prepare($query);
            $statement->execute(['residence_label' => $r_label]);
            $results = $statement->fetch(PDO::FETCH_ASSOC);
            return $results;
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    // Change le propriétaire d'une résidence en modifiant 'personne_id'
    public static function buyOne($idAcheteur, $r_label) {
        try {
            $database = Model::getInstance();
            $query = "UPDATE residence SET personne_id=:id WHERE `id`=:label";
            $statement = $database->prepare($query); 
            $statement->execute(['id'=>$idAcheteur, 'label'=>$r_label]);
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    // Retourne un array contenant toutes les résidences n'appartenant pas au client et dont le prix est inférieur au montant du compte choisi
    public static function getAvailable($id, $id_compte) {
        try {
            $database = Model::getInstance();
            $query = "select r.* from residence as r, personne as p, compte as c where r.personne_id=p.id and p.id!=:id and c.id=:compte_id and r.prix <= c.montant order by r.prix;";
            $statement = $database->prepare($query); 
            $statement->execute(['id'=>$id, 'compte_id'=>$id_compte]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelResidence');
            return $results;
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
}
?>

<!-- ----- fin ModelResidence -->
