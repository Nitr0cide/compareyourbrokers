<div class="container">
    <h1>Trouver son broker</h1>
</div>
<?php
if (isset($_POST['q1']) && isset($_POST['q2']) && isset($_POST['q3'])) {
    if ($_POST['q1'] != "0" && $_POST['q2'] != "0" && $_POST['q3'] != "0") {
        $brokers = new brokers();
        $brokers = $brokers->sortBrokers();
        include "broker.php";
    }
}

?>
<form id="questionnaire" method="post" action="">
    <div class="sel sel--black-panther">
        <select name="q1" id="experience">
            <option value="0">Mon expérience dans le trading</option>
            <option value="1">Débutant - Je n'ai aucune expérience</option>
            <option value="2">Intermediaire - Je n'ai pas d'expérience significative</option>
            <option value="3">Avancé - Je peux réaliser des transactions complexes</option>
            <option value="4">Expert - Je suis trader</option>
        </select>
    </div>

    <div class="sel sel--superman">
        <select name="q2" id="depotmin">
            <option value="0">Mon dépôt initial</option>
            <option value="1">Je compte investir moins de 1.000$</option>
            <option value="2">Je compte investir moins de 10.000$</option>
            <option value="3">Je compte investir moins de 50.000$</option>
            <option value="4">Je compte investir 50.000$ ou plus</option>
        </select>
    </div>

    <div class="sel sel--superman">
        <select name="q3" id="frequence">
            <option value="0">Ma fréquence de trading</option>
            <option value="1">J'investis très occasionnellement</option>
            <option value="2">J'investis chaque mois</option>
            <option value="3">J'investis chaque semaine</option>
            <option value="4">J'investis tous les jours</option>
        </select>
    </div>

    <div class="sel sel--superman">
        <select name="q4" id="contrats">
            <option value="0">Les contrats qui m'intéressent</option>
            <option value="1">Les contrats sur les Stocks et ETF m'intéressent</option>
            <option value="2">Les contrats sur le Forex</option>
            <option value="3">Les contrats sur les Options & Futures m'intéressent</option>
            <option value="4">Les contrats sur les CFDs m'intéressent</option>
            <option value="5">Les contrats sur la Crypto m'intéressent</option>
            <option value="6">Je ne sais pas quels contrats m'intéressent</option>
        </select>
    </div>
    <button id="questSubmit" class="btn btn-primary" type="submit">Trouver mon broker</button>
</form>