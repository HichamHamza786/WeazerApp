<?php

use App\Controllers\ErrorController;
use App\Controllers\MainController;

require_once __DIR__ . "/vendor/autoload.php";

$router = new Altorouter();

$router->setBasePath($_SERVER['BASE_URI']);

$router->map(
    "GET",
    "/",
    [
        'controller' => MainController::class,
        'method' => 'home',
    ],
    'home'
);

$match = $router->match();

if ($match) {
    // On appelle la bonne page (bonne méthode de bon controller)

    $controller = new $match['target']['controller']();
    $method = $match['target']['method'];

    // Le dispatcher
    $controller->$method($match["params"]);
} else {
    // Erreur 404
    $controller = new ErrorController();
    $controller->error404();
}

