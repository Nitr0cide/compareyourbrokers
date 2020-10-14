<?php


class model
{

    // L'attribut sera écrasé en fonction de l'attribut de son enfant direct instantié
    protected $table = "";
    // L'attribut sera écrasé en fonction de l'attribut de ses enfants directs instantié
    protected $champs = [];
    // Par défaut la clé primaire sera l'id, si dans la DB nous avons
    // une clé primaire sous une autre forme, nous transformerons cette variable
    // en array
    protected $primaryK = "id";

    public function __construct($id = null)
    {
        if ($id !== null) {
            $this->loadById($id);
        }
    }

    public static function insert($champs, $params, $subject)
    {
        global $bdd;
        echo "INSERT???";
        $sqlFields = implode(",", $champs);

        $sql = "INSERT INTO `$subject->table` SET $sqlFields";
        $req = $bdd->prepare($sql);

        // On enlève la primary key de notre tableau de paramètre pour que la requête INSERT soit correcte
        unset($params[":" . $subject->primaryK]);

        if (!$req->execute($params)) {
            debug("Un problème avec la requête $sql");
            var_dump($params);
            return false;
        }

        return true;
    }

    public static function update($champs, $params, $subject)
    {
        // BASE DE DONNEES
        global $bdd;
        // Update un objet à partir d'un formulaire
        $sqlFields = implode(",", $champs);

        $sql = "UPDATE `$subject->table` SET $sqlFields WHERE `$subject->primaryK` = :id";
        $req = $bdd->prepare($sql);

        if (!$req->execute($params)) {
            debug("Un problème avec la requête $sql");
            var_dump($params);
            return false;
        }


        return true;


    }

    public static function set($routeParams)
    {
        // Donnez toutes les valeurs saisies dans le formulaire à l'objet puis appeler la fonction qui update ou insert l'objet dans la DB
        $champs = [];
        $params = [];

        $subject = new $routeParams['object']();

        foreach ($subject->champs as $key => $value) {
            // On ne veut pas effectuer de vérification ou de modification sur l'ID
            if ($key !== $subject->primaryK) {
                // On gère le type image
                if (!empty($_FILES)) {
                    if ($value['type'] === "image") {
                        $subject->champs[$key]["valeur"] = "/img/broker_logo/" . $_FILES[$key]['name'];
                        $champs[] .= "`" . $key . "`" . " = :" . $key;
                        $params[":$key"] = $subject->champs[$key]['valeur'];
                        if (move_uploaded_file($_FILES[$key]['tmp_name'], "{$_SERVER['DOCUMENT_ROOT']}/img/broker_logo/{$_FILES[$key]['name']}")) {
                            echo "ALLO??";
                            continue;
                        } else {
                            echo "logo pas uploadé";
                            exit;
                        }
                    }
                }
                if (!empty($_POST[$key]) || $_POST[$key] != '') {
                    // On attribue les valeurs
                    $subject->champs[$key]["valeur"] = $_POST[$key];
                    // On récupère les champs ici pour construire la requête SQL;
                    $champs[] .= "`" . $key . "`" . " = :" . $key;
                }
            }
            $params[":$key"] = $subject->champs[$key]["valeur"];
        }
        if (!isset($routeParams[$subject->primaryK])) {
            self::insert($champs, $params, $subject);
        } else {
            $params[":$subject->primaryK"] = $routeParams['id'];
            self::update($champs, $params, $subject);
        }
    }

    public static function delete($routeParams)
    {
        global $bdd;

        $sql = "DELETE FROM `{$routeParams['object']}` WHERE `id` = :id";

        $req = $bdd->prepare($sql);


        if (!$req->execute([":id" => $routeParams['id']])) {
            debug("Il y a eu un problème lors de la suppression : $sql");
        }
        return true;
    }

    public function getChamps() {
        if (isset($this->champs)) {
            return $this->champs;
        }
    }

    public function get($champ)
    {
        // Récupère la valeur contenu dans un champ
        // Paramètres : String correspondant au nom d'un champ

        if (isset($this->champs[$champ])) {
            return $this->champs[$champ]["valeur"];
        }
    }


    public function loadById($id)
    {
        // Charger un objet en bdd
        // Paramètre : un ID

        global $bdd;

        $sql = "SELECT * FROM `$this->table` WHERE `$this->primaryK` = :id";

        $params = [":id" => $id];

        $req = $bdd->prepare($sql);

        if (!$req->execute($params)) {
            echo "La requête $sql ne s'est pas éxécuté correctement";
            return false;
        }

        $ligne = $req->fetch(PDO::FETCH_ASSOC);

        if ($ligne === false) {
            // Pas de ligne récupérée
            debug($this->table . "->loadById() : pas d'id $id");
            return false;
        }

        $tableau = $this->champs;

        foreach ($tableau as $key => $value) {
            $this->champs[$key]["valeur"] = $ligne[$key];
        }
    }

    public function checkLinkedTable($champ)
    {
        // On regarde si notre objet pointe vers une autre table
        // Si on a un pointeur, on renvoie l'objet chargé
        // Sinon on renvoie false
        // Paramètres : un sous-array de notre objet
        if (isset($champ["link"])) {
            $newObj = $champ["link"];
            try {
                $obj = new $newObj($this->champs[$this->primaryK]["valeur"]);
                return $obj;
            } catch (Exception $ex) {
                echo $ex;
            }
        } else {
            return false;
        }
    }

    public function listAll()
    {

        global $bdd;

        if (!isset($this->table)) {
            // Si le model chargé ne correspond à aucune table dans la base de données on retourne false
            return false;
        }

        $sql = "SELECT `id` FROM `$this->table`";

        $req = $bdd->prepare($sql);

        $result = [];

        if (!$req->execute()) {
            debug("La requête listeHotels(): $sql n'a pas pu être exécutée...");
            return [];
        }

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $newObj = $this->table;
            $obj = new $newObj();
            $obj->loadById($ligne[$this->primaryK]);
            $result[] = $obj;
        }

        if ($result === []) {
            debug("Aucun $this->table dans la base");
            return;
        }

        return $result;
    }

}

