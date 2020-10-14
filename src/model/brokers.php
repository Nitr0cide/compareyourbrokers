<?php


class brokers extends model
{
    protected $primaryK = "id";
    protected $table = "brokers";
    protected $champs = [
        "logo_url" => [
            "type" => "image",
            "valeur" => "",
            "label" => "Logo",
        ],
        "name" => [
            "type" => "text",
            "valeur" => "",
            "label" => "Broker",
        ],
        "loi_broker" => [
            "type" => "textarea",
            "valeur" => "",
            "label" => "Le texte de loi relatif au broker"
        ],
        "referral_link" => [
            "type" => "url",
            "valeur" => "",
            "label" => "Lien de parrainage",
        ],
        "knowmore" => [
            "type" => "text",
            "valeur" => "",
            "label" => "En savoir plus",
        ],
        "id" => [
            "type" => "int",
            "valeur" => "",
            "label" => "",
        ],
        "frais_actions" => [
            "type" => "bool",
            "valeur" => "",
            "label" => "Frais sur les actions",
        ],
        "actions_UsUkEuAus" => [
            "type" => "text",
            "valeur" => "",
            "label" => "Frais sur les actions US/UK/EU/AUS",
        ],
        "frais_forex" => [
            "type" => "bool",
            "valeur" => "",
            "label" => "Frais sur le forex",
        ],
        "forex_mme" => [
            "type" => "text",
            "valeur" => "",
            "label" => "Frais sur les Majors/Minors/Exotics",
        ],
        "frais_cfd" => [
            "type" => "bool",
            "valeur" => "",
            "label" => "Frais sur les CFD",
        ],
        "cfd_ISMF" => [
            "type" => "text",
            "valeur" => "",
            "label" => "Frais sur les cash indices/Spot Metal/Futures",
        ],
        "frais_depotsRetraits" => [
            "type" => "bool",
            "valeur" => "",
            "label" => "Frais sur les dépôts/retraits",
        ],
        "frais_depots" => [
            "type" => "text",
            "valeur" => "",
            "label" => "Frais sur les dépôts",
        ],
        "frais_retraits" => [
            "type" => "text",
            "valeur" => "",
            "label" => "Frais sur les retraits",
        ],
        "frais_inactivite" => [
            "type" => "text",
            "valeur" => "",
            "label" => "Frais d'inactivité",
        ],
        "depot_type" => [
            "type" => "text",
            "valeur" => "",
            "label" => "Type de dépôt",
        ],
        "retrait_type" => [
            "type" => "text",
            "valeur" => "",
            "label" => "Type de retrait",
        ],
        "account_depotMin" => [
            "type" => "text",
            "valeur" => "",
            "label" => "Dépôt minimum",
        ],
        "account_delai" => [
            "type" => "text",
            "valeur" => "",
            "label" => "Délai d'ouverture de compte",
        ],
        "account_documents" => [
            "type" => "text",
            "valeur" => "",
            "label" => "Documents nécessaires",
        ],
        "account_demo" => [
            "type" => "bool",
            "valeur" => "",
            "label" => "Compte démo",
        ],
        "cs_tel" => [
            "type" => "tel",
            "valeur" => "",
            "label" => "Assistance téléphonique"
        ],
        "cs_livechat" => [
            "type" => "text",
            "valeur" => "",
            "label" => "Assistance livechat",
        ],
        "cs_mail" => [
            "type" => "email",
            "valeur" => "",
            "label" => "Email",
        ],
        "pays" => [
            "type" => "text",
            "valeur" => "",
            "label" => "Pays siège",
        ],
        "q1" => [
            "type" => "question",
            "valeur" => "",
            "label" => "Question 1"
        ],
        "q2" => [
            "type" => "question",
            "valeur" => "",
            "label" => "Question 2"
        ],
        "q3" => [
            "type" => "question",
            "valeur" => "",
            "label" => "Question 3"
        ],
        "q4" => [
            "type" => "question",
            "valeur" => "",
            "label" => "Question 4"
        ],
    ];

    public function __construct($id = null)
    {
        if ($id !== null){
            $this->loadById($id);
        }
    }

    public function sortBrokers() {
        global $bdd;
        $result = [];

        $sql = "SELECT * FROM $this->table WHERE `q1` = :q1 AND `q2` = :q2 AND `q3` = :q3";
        $_POST['q4'] !== "0" && $_POST['q4'] !== "6" ? $sql .= " AND `q4` = :q4" : "";

        $params = [":q1" => $_POST['q1'], ":q2" => $_POST['q2'], ":q3" => $_POST['q3']];

        if ($_POST['q4'] !== "0" && $_POST['q4'] !== "6") {
            $params[":q4"] = $_POST['q4'];
        }

        $req = $bdd->prepare($sql);

        if (!$req->execute($params)) {
            echo "Problème avec $sql";
            return false;
        }

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $newObj = $this->table;
            $obj = new $newObj();
            $obj->loadById($ligne[$this->primaryK]);
            $result[] = $obj;
        }
        if ($result === []) {
            echo "<div class='container'>";
            echo "<p class='no-broker'>Nous sommes désolés, aucun broker ne correspond à vos critères. <br/>Vous pouvez consultez directement notre <a href='/comparebrokers'>comparateur</a> pour des détails sur tous les brokers que nous vous proposons.</p>";
            echo "</div>";
            return;
        }

        return $result;
    }

}