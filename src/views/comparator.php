<?php
$champs = $brokers[0]->getChamps();
?>
<div class="container">
    <h1 class=>Comparateur de brokers</h1>
</div>
<div class="table-users" onscroll="headerbackground()">
    <table cellspacing="0">
        <?php
        echo "<tr>";
        foreach ($champs as $key => $champ) {
            if ($key === "logo_url" || $key === "name" || $key === "referral_link") {
                echo "<td class='tabheader'></td>";
                continue;
            }
            if ($champ['type'] === "question" || $key === "knowmore" || $key === "loi_broker")  {
                continue;
            }
            if ($key !== "id") {
                echo "<td>{$champ['label']}</td>";
            }
        }
        echo "</tr>";

        foreach ($brokers as $broker) {
            echo "<tr>";
            foreach ($broker->getChamps() as $key => $champ) {
                if ($champ['type'] === "question" || $key === "knowmore") {
                    continue;
                }
                // On affiche une image dans le cas d'un type bool
                if ($champ['type'] === "bool") {
                    if ($champ['valeur'] === "1") {
                        echo "<td><img class='tick' src='/images/icons/tick.png'></td>";
                    } else {
                        echo "<td><img class='tick' src='/images/icons/close.png'></td>";
                    }
                    continue;
                }
                if ($key === "name") {
                    echo "<td class='tabheader'><span>{$champ['valeur']}</span></td>";
                    continue;
                }
                if ($key === "referral_link") {
                    echo "<td class='tabheader'><a class='btn btn-primary bg-dark' href='{$champ['valeur']}'>Ouvrir un compte</a></td>";
                    continue;
                }
                if ($key === "logo_url") {
                    echo "<td class='tabheader'><img src='{$champ['valeur']}'></td>";
                    continue;
                }
                if ($key === "id" || $key === "loi_broker") {
                    continue;
                }
                if ($key !== "logo_url") {
                    echo "<td>{$champ["valeur"]}</td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>

