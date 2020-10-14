<?php


class forms extends model
{
    protected $table;
    protected $champs = [];
    protected $primaryK = "";
    protected $form = "";
    protected $access = "";

    public function __construct($object, $id = null)
    {
        if (!$object) {
            echo "Aucun objet à traiter";
            return false;
        }
        if ($id !== null) {
            $obj = new $object($id);
        } else {
            $obj = new $object();
        }
        $this->handleForm($obj->getChamps());
    }

    public function getForm()
    {
        if (isset($this->form)) {
            return $this->form;
        }
    }

    public function handleForm($champs)
    {
        foreach ($champs as $key => $champ) {
            if ($key !== "id") {
                // On gère le cas du type bool du model de données pour l'affichage particulier des input radio avec Bootstrap
                if ($champ['type'] === "bool") {
                    $this->handleBoolType($key, $champ);
                    continue;
                }
                if ($champ['type'] === "question") {
                    $this->handleQuestionType($key, $champ);
                    continue;
                }
                $this->form .= $this->handleDivWrapper($champ);
                $this->form .= $this->handleLabel($key, $champ);
                $this->form .= $this->handleType($key, $champ);
                $this->form .= "</div>";
            }
        }
    }

    public function handleDivWrapper($champ)
    {
        return "<div class='form-group'>";
    }

    public function handleType($key, $champ)
    {
        $callMethod = "formType_" . $champ['type'];
        return $this->$callMethod($key, $champ);
    }

    public function handleLabel($key, $champ)
    {
        $label = $champ['label'];
        return "<label for='$key'>{$label}</label>";
    }

    public function handleBoolType($key, $champ)
    {
        $this->form .= "<p>{$champ['label']}</p>";
        if ((boolean)$champ['valeur'] === true) {
            $this->form .= "<div class='radiocontainer'>";
            $this->form .= "<div class='form-check form-check-inline'>";
            $this->form .= "<input class='form-check-input' type='radio' name='{$key}' value='1' checked>";
            $this->form .= "<label class='form-check-label' for='{$key}'>Oui</label>";
            $this->form .= "</div>";
            $this->form .= "<div class='form-check form-check-inline'>";
            $this->form .= "<input class='form-check-input' type='radio' name='{$key}' value='0'>";
            $this->form .= "<label class='form-check-label' for='{$key}'>Non</label>";
            $this->form .= "</div>";
            $this->form .= "</div>";
        } else {
            $this->form .= "<div class='radiocontainer'>";
            $this->form .= "<div class='form-check form-check-inline'>";
            $this->form .= "<input class='form-check-input' type='radio' name='{$key}' value='1'>";
            $this->form .= "<label class='form-check-label' for='{$key}'>Oui</label>";
            $this->form .= "</div>";
            $this->form .= "<div class='form-check form-check-inline'>";
            $this->form .= "<input class='form-check-input' type='radio' name='{$key}' value='0' checked>";
            $this->form .= "<label class='form-check-label' for='{$key}'>Non</label>";
            $this->form .= "</div>";
            $this->form .= "</div>";
        }
        $this->form .= "</div>";
    }

    public function handleQuestionType($key, $champ)
    {
        $callMethod = "handle".$key;
        $this->form .= $this->$callMethod($champ);
    }

    public function handleq1($champ)
    {
        if ($champ['valeur'] == "1") {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q1" id="experience">';
            $this->form .= '<option value="">Mon expérience dans le trading</option>';
            $this->form .= '<option value="1" selected>Débutant - Je n\'ai aucune expérience</option>';
            $this->form .= '<option value="2">Intermediaire - Je n\'ai pas d\'expérience significative</option>';
            $this->form .= '<option value="3">Avancé - Je peux réaliser des transactions complexes</option>';
            $this->form .= '<option value="4">Expert - Je suis trader</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        } elseif ($champ['valeur'] == "2") {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q1" id="experience">';
            $this->form .= '<option value="">Mon expérience dans le trading</option>';
            $this->form .= '<option value="1">Débutant - Je n\'ai aucune expérience</option>';
            $this->form .= '<option value="2" selected>Intermediaire - Je n\'ai pas d\'expérience significative</option>';
            $this->form .= '<option value="3">Avancé - Je peux réaliser des transactions complexes</option>';
            $this->form .= '<option value="4">Expert - Je suis trader</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        } elseif ($champ['valeur'] == "3") {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q1" id="experience">';
            $this->form .= '<option value="">Mon expérience dans le trading</option>';
            $this->form .= '<option value="1">Débutant - Je n\'ai aucune expérience</option>';
            $this->form .= '<option value="2">Intermediaire - Je n\'ai pas d\'expérience significative</option>';
            $this->form .= '<option value="3" selected>Avancé - Je peux réaliser des transactions complexes</option>';
            $this->form .= '<option value="4">Expert - Je suis trader</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        } elseif ($champ['valeur'] == "4") {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name=q1" id="experience">';
            $this->form .= '<option value="">Mon expérience dans le trading</option>';
            $this->form .= '<option value="1">Débutant - Je n\'ai aucune expérience</option>';
            $this->form .= '<option value="2">Intermediaire - Je n\'ai pas d\'expérience significative</option>';
            $this->form .= '<option value="3">Avancé - Je peux réaliser des transactions complexes</option>';
            $this->form .= '<option value="4" selected>Expert - Je suis trader</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        } else {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q1" id="experience">';
            $this->form .= '<option value="">Mon expérience dans le trading</option>';
            $this->form .= '<option value="1">Débutant - Je n\'ai aucune expérience</option>';
            $this->form .= '<option value="2">Intermediaire - Je n\'ai pas d\'expérience significative</option>';
            $this->form .= '<option value="3">Avancé - Je peux réaliser des transactions complexes</option>';
            $this->form .= '<option value="4">Expert - Je suis trader</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        }
    }

    public function handleq2($champ)
    {
        if ($champ['valeur'] == "1") {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q2" id="depotmin">';
            $this->form .= '<option value="">Mon dépôt initial</option>';
            $this->form .= '<option value="1" selected>Je compte investir moins de 1000$</option>';
            $this->form .= '<option value="2">Je compte investir entre 1000 et 10000$</option>';
            $this->form .= '<option value="3">Je compte investir entre 10000 et 50000$</option>';
            $this->form .= '<option value="4">Je compte investir entre 50.000$ ou plus</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        } elseif ($champ['valeur'] == "2") {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q2" id="depotmin">';
            $this->form .= '<option value="">Mon dépôt initial</option>';
            $this->form .= '<option value="1">Je compte investir moins de 1000$</option>';
            $this->form .= '<option value="2" selected>Je compte investir entre 1000 et 10000$</option>';
            $this->form .= '<option value="3">Je compte investir entre 10000 et 50000$</option>';
            $this->form .= '<option value="4">Je compte investir entre 50.000$ ou plus</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        } elseif ($champ['valeur'] == "3") {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q2" id="depotmin">';
            $this->form .= '<option value="">Mon dépôt initial</option>';
            $this->form .= '<option value="1">Je compte investir moins de 1000$</option>';
            $this->form .= '<option value="2">Je compte investir entre 1000 et 10000$</option>';
            $this->form .= '<option value="3" selected>Je compte investir entre 10000 et 50000$</option>';
            $this->form .= '<option value="4">Je compte investir entre 50.000$ ou plus</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        } elseif ($champ['valeur'] == "4") {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q2" id="depotmin">';
            $this->form .= '<option value="">Mon dépôt initial</option>';
            $this->form .= '<option value="1">Je compte investir moins de 1000$</option>';
            $this->form .= '<option value="2">Je compte investir entre 1000 et 10000$</option>';
            $this->form .= '<option value="3">Je compte investir entre 10000 et 50000$</option>';
            $this->form .= '<option value="4" selected>Je compte investir entre 50.000$ ou plus</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        } else {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q2" id="depotmin">';
            $this->form .= '<option value="">Mon dépôt initial</option>';
            $this->form .= '<option value="1">Je compte investir moins de 1000$</option>';
            $this->form .= '<option value="2">Je compte investir entre 1000 et 10000$</option>';
            $this->form .= '<option value="3">Je compte investir entre 10000 et 50000$</option>';
            $this->form .= '<option value="4">Je compte investir entre 50.000$ ou plus</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        }
    }

    public function handleq3($champ)
    {
        if ($champ['valeur'] == "1") {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q3" id="frequence">';
            $this->form .= '<option value="">Ma fréquence de trading</option>';
            $this->form .= '<option value="1" selected>J\'investis très occasionnellement</option>';
            $this->form .= '<option value="2">J\'investis chaque mois</option>';
            $this->form .= '<option value="3">J\'investis chaque semaine</option>';
            $this->form .= '<option value="4">J\'investis tous les jours</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        } elseif ($champ['valeur'] == "2") {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q3" id="frequence">';
            $this->form .= '<option value="">Ma fréquence de trading</option>';
            $this->form .= '<option value="1" selected>J\'investis très occasionnellement</option>';
            $this->form .= '<option value="2" selected>J\'investis chaque mois</option>';
            $this->form .= '<option value="3">J\'investis chaque semaine</option>';
            $this->form .= '<option value="4">J\'investis tous les jours</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        } elseif ($champ['valeur'] == "3") {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q3" id="frequence">';
            $this->form .= '<option value="">Ma fréquence de trading</option>';
            $this->form .= '<option value="1" selected>J\'investis très occasionnellement</option>';
            $this->form .= '<option value="2">J\'investis chaque mois</option>';
            $this->form .= '<option value="3" selected>J\'investis chaque semaine</option>';
            $this->form .= '<option value="4">J\'investis tous les jours</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        } elseif ($champ['valeur'] == "4") {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q3" id="frequence">';
            $this->form .= '<option value="">Ma fréquence de trading</option>';
            $this->form .= '<option value="1" selected>J\'investis très occasionnellement</option>';
            $this->form .= '<option value="2">J\'investis chaque mois</option>';
            $this->form .= '<option value="3">J\'investis chaque semaine</option>';
            $this->form .= '<option value="4" selected>J\'investis tous les jours</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        } else {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q3" id="frequence">';
            $this->form .= '<option value="">Ma fréquence de trading</option>';
            $this->form .= '<option value="1">J\'investis très occasionnellement</option>';
            $this->form .= '<option value="2">J\'investis chaque mois</option>';
            $this->form .= '<option value="3">J\'investis chaque semaine</option>';
            $this->form .= '<option value="4">J\'investis tous les jours</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        }
    }

    public function handleq4($champ)
    {
        if ($champ['valeur'] == "1") {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q4" id="contrats">';
            $this->form .= '<option value="">Les contrats qui m\'intéressent</option>';
            $this->form .= '<option value="1" selected>Les contrats sur les stocks et ETF m\'intéressent</option>';
            $this->form .= '<option value="2">Les contrats sur le Forex m\'intéressent</option>';
            $this->form .= '<option value="3">Les contrats sur les Options & Futures m\'intéressent</option>';
            $this->form .= '<option value="4">Les contrats sur les CFDs m\'intéressent</option>';
            $this->form .= '<option value="5">Les contrats sur la crypto m\'intéressent</option>';
            $this->form .= '<option value="6">Je ne sais pas quels contrats m\'intéressent</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        } elseif ($champ['valeur'] == "2") {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q4" id="contrats">';
            $this->form .= '<option value="">Les contrats qui m\'intéressent</option>';
            $this->form .= '<option value="1">Les contrats sur les stocks et ETF m\'intéressent</option>';
            $this->form .= '<option value="2" selected>Les contrats sur le Forex m\'intéressent</option>';
            $this->form .= '<option value="3">Les contrats sur les Options & Futures m\'intéressent</option>';
            $this->form .= '<option value="4">Les contrats sur les CFDs m\'intéressent</option>';
            $this->form .= '<option value="5">Les contrats sur la crypto m\'intéressent</option>';
            $this->form .= '<option value="6">Je ne sais pas quels contrats m\'intéressent</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        } elseif ($champ['valeur'] == "3") {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q4" id="contrats">';
            $this->form .= '<option value="">Les contrats qui m\'intéressent</option>';
            $this->form .= '<option value="1">Les contrats sur les stocks et ETF m\'intéressent</option>';
            $this->form .= '<option value="2">Les contrats sur le Forex m\'intéressent</option>';
            $this->form .= '<option value="3" selected>Les contrats sur les Options & Futures m\'intéressent</option>';
            $this->form .= '<option value="4">Les contrats sur les CFDs m\'intéressent</option>';
            $this->form .= '<option value="5">Les contrats sur la crypto m\'intéressent</option>';
            $this->form .= '<option value="6">Je ne sais pas quels contrats m\'intéressent</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        } elseif ($champ['valeur'] == "4") {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q4" id="contrats">';
            $this->form .= '<option value="">Les contrats qui m\'intéressent</option>';
            $this->form .= '<option value="1" selected>Les contrats sur les stocks et ETF m\'intéressent</option>';
            $this->form .= '<option value="2">Les contrats sur le Forex m\'intéressent</option>';
            $this->form .= '<option value="3">Les contrats sur les Options & Futures m\'intéressent</option>';
            $this->form .= '<option value="4" selected>Les contrats sur les CFDs m\'intéressent</option>';
            $this->form .= '<option value="5">Les contrats sur la crypto m\'intéressent</option>';
            $this->form .= '<option value="6">Je ne sais pas quels contrats m\'intéressent</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        } elseif ($champ['valeur'] == "5") {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q4" id="contrats">';
            $this->form .= '<option value="">Les contrats qui m\'intéressent</option>';
            $this->form .= '<option value="1" selected>Les contrats sur les stocks et ETF m\'intéressent</option>';
            $this->form .= '<option value="2">Les contrats sur le Forex m\'intéressent</option>';
            $this->form .= '<option value="3">Les contrats sur les Options & Futures m\'intéressent</option>';
            $this->form .= '<option value="4">Les contrats sur les CFDs m\'intéressent</option>';
            $this->form .= '<option value="5" selected>Les contrats sur la crypto m\'intéressent</option>';
            $this->form .= '<option value="6">Je ne sais pas quels contrats m\'intéressent</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        } elseif ($champ['valeur'] == "6") {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q4" id="contrats">';
            $this->form .= '<option value="">Les contrats qui m\'intéressent</option>';
            $this->form .= '<option value="1" selected>Les contrats sur les stocks et ETF m\'intéressent</option>';
            $this->form .= '<option value="2">Les contrats sur le Forex m\'intéressent</option>';
            $this->form .= '<option value="3">Les contrats sur les Options & Futures m\'intéressent</option>';
            $this->form .= '<option value="4">Les contrats sur les CFDs m\'intéressent</option>';
            $this->form .= '<option value="5">Les contrats sur la crypto m\'intéressent</option>';
            $this->form .= '<option value="6" selected>Je ne sais pas quels contrats m\'intéressent</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        } else {
            $this->form .= '<div class="sel sel--black-panther">';
            $this->form .= '<select name="q4" id="contrats">';
            $this->form .= '<option value="">Les contrats qui m\'intéressent</option>';
            $this->form .= '<option value="1">Les contrats sur les stocks et ETF m\'intéressent</option>';
            $this->form .= '<option value="2">Les contrats sur le Forex m\'intéressent</option>';
            $this->form .= '<option value="3">Les contrats sur les Options & Futures m\'intéressent</option>';
            $this->form .= '<option value="4">Les contrats sur les CFDs m\'intéressent</option>';
            $this->form .= '<option value="5">Les contrats sur la crypto m\'intéressent</option>';
            $this->form .= '<option value="6">Je ne sais pas quels contrats m\'intéressent</option>';
            $this->form .= "</select>";
            $this->form .= "</div>";
        }
    }

    public function formType_int($key, $champ)
    {
        return "<input type='text' class='form-control' name='$key' value='{$champ['valeur']}'>";
    }

    public function formType_image($key, $champ)
    {
        $this->form .= "<input type='file' class='form-control-file' name='{$key}' id='logoInput' value='{$champ['valeur']}'>";
    }

    public function formType_url($key, $champ)
    {
        return "<input type='text' class='form-control' name='$key' value='{$champ['valeur']}'>";
    }

    public function formType_text($key, $champ)
    {
        return "<input type='text' class='form-control' name='$key' value='{$champ['valeur']}'>";
    }

    public function formType_email($key, $champ)
    {
        return "<input type='email' class='form-control' name='$key' value='{$champ['valeur']}'>";
    }

    public function formType_tel($key, $champ)
    {
        return "<input type='tel' class='form-control' name='$key' value='{$champ['valeur']}'>";
    }
    public function formType_textarea($key, $champ)
    {
        return "<textarea class='form-control' rows='5' name='$key'>{$champ['valeur']}</textarea>";
    }
}