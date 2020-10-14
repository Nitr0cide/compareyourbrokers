<?php
// En paramètre de cette page :
// un $id ou non (pour passer notre formulaire en création ou modification)
// L'objet (obligatoire) pour créer le formulaire respectant le schéma de la
// base de données

if ($_SESSION["login"] !== "admin") {
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    display404();
    exit;
}
$object = $match['params']['object'];
isset($match['params']['id']) ? $id = $match['params']['id'] : $id = null;
if (!empty($match["params"]["id"])) {
    $mode = "update";
    $modelForm = new forms($object, $id);
} else {
    $mode = "insert";
    $modelForm = new forms($object);
}


?>

<form id='adminForm' enctype="multipart/form-data" class="container" method="POST" action="<?= $router->generate("actionForm")."{$object}{$id}"?>">
<?php
echo $modelForm->getForm();
?>
    <input type="submit" value="valider" class="btn btn-primary" id="adminSubmit">
</form>

