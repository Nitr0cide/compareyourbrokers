<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Comparateur de brokers">
    <meta name="keywords" content="brokers comparateur trader crypto monnaies vantageFX investir bourse blockchain">
    <meta name="author" content="Compare Your Brokers">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compare your brokers</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="/Fonts/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/table.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/public/css/custom.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/brokertemplate.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/login.css"/>
    <link type="text/css" rel="stylesheet" href="/public/css/404.css" />
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Compare Your Brokers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= $router->generate("home") ?>">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $router->generate('findbroker') ?>">Trouver votre broker</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="<?= $router->generate("comparator") ?>">Comparateur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $router->generate("contacts")?>">Contacts</a>
                </li>
                <?php if ($_SESSION["login"] === "admin"): ?>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary" href="<?= $router->generate("adminPage")?>">Gérer les brokers</a>
                </li>
                <?php endif; ?>
            </ul>
            <?php if ($_SESSION["login"] === "admin"): ?>
            <form class="form-inline my-2 my-lg-0" method="POST" action="<?= $router->generate("disconnect") ?>">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Se déconnecter</button>
            </form>
            <?php endif; ?>
        </div>
    </nav>
</header>

