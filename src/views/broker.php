<?php
// Template d'affichage des brokers
$divCount = 0;
?>
<section id="pricePlans">
    <div class="container">
        <?php if ($_SESSION["login"] === "admin"):?>
        <a href="<?= $router->generate("formWithoutId")."brokers" ?>"><button class="btn btn-primary mr-auto w-100 text-center">Ajouter un broker</button></a>
        <?php endif;
        if (!empty($brokers)) {
            foreach ($brokers as $broker) {
                if ($divCount % 4 == 0) {
                    echo "<div class='row'>";
                }
                ?>

                <ul id="plans" class="col-lg-3 col-md-6 col-sm-10">
                    <li class="plan">
                        <ul class="planContainer">
                            <li><img src="<?= $broker->get("logo_url") ?>"
                                     alt="Logo du broker <?= $broker->get("name") ?>"></li>
                            <li class="title"><h2><?= $broker->get("name") ?></h2></li>
                            <li>
                                <ul class="options">
                                    <li>Dépôt minimum : <span><?= $broker->get("account_depotMin") ?></span></li>
                                    <li class="broker-law"><?= $broker->get("loi_broker") ?></li>
                                </ul>
                            </li>
                            <li class="button flex" style="font-size: 0.7em"><a class ="open" href="<?= $broker->get("referral_link") ?>" target="_blank">Ouvrir un compte</a>
                            </li>
                            <li class="button flex"><a class="knowmore" href="<?= $broker->get("knowmore") ?>"
                                                                target="_blank">En savoir plus</a></li>
                            <?php if ($_SESSION["login"] === "admin"): ?>
                                <li class="button"><a
                                            href="<?= $router->generate("formWithId") . get_class($broker) . $broker->get('id') ?>">Modifier</a>
                                </li>
                                <li class="button"><a
                                            href="<?= $router->generate("deleteBroker") . get_class($broker) . $broker->get('id') ?>">Supprimer</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>

                <?php
                $divCount++;
                if ($divCount > 0 && $divCount % 4 == 0) {
                    echo "</div>";
                }
            }
        }
        ?>
    </div>
</section>