<?php
$uri = $_SERVER["REQUEST_URI"];
require "../ini/ini.php";

$session = new session();

// ON DEFINIT NOS ROUTES ICI
$router = new AltoRouter();

$brokers = new brokers();
$brokers = $brokers->listAll();


// Liens users
$router->map("GET", "/", "home", "home");
$router->map("GET|POST", "/findbroker", "questionnaire", "findbroker");
$router->map("GET", "/comparebrokers","comparator", "comparator");
$router->map("GET", "/contacts", "contacts", "contacts");

// Lien admin
$router->map("GET", "/admin", $_SESSION["login"] === "admin"?"admin/brokerAdmin":"admin/adminLogin", "adminPage");
$router->map("POST", "/admin", "session::checkLogin", "adminLogin");
$router->map("POST", "/", "session::deconnection", "disconnect");
$router->map("GET", "/admin/form[*:object][i:id]", "admin/form", "formWithId" );
$router->map("GET", "/admin/form[*:object]", "admin/form", "formWithoutId" );
$router->map("POST", "/admin/form/[*:object][i:id]", "model::set", "actionForm");
$router->map("POST", "/admin/form/[*:object]", "model::set");
$router->map("GET", "/admin/delete[*:object][i:id]", "model::delete", "deleteBroker");

$match = $router->match();

// On gère le traitement des URL

// Si notre URL match
if( $match !== false) {
    // On a au moins le header (et le footer)
    include "../src/views/header.php";
    // On affiche pas le slider pour les URL admin
    if (strpos($uri, "/admin") === false) {
        include "../src/views/slider.php";
    }
    if ( is_callable($match['target']) ) {
        if (!empty($match['params']) ) {
            call_user_func($match['target'], $match['params']);
        } else {
            $match['target']();
        }
        if (strpos($uri, "/admin") === false) {
            header('Location: '.$router->generate("home"));
            exit;
        } else {
            header('Location: '.$router->generate("adminPage"));
            exit;
        }
    } else {
        include "../src/views/{$match['target']}.php";
        if (strpos($uri, "/admin") === false) {
            include "../src/views/footer.php";
        }
    }
} else {
    include "../src/views/header.php";
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    display404();
}



