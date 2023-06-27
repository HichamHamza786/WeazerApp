<?php
    $currentPage = !empty($_GET['page']) ? $_GET['page'] : 'home';
    
    require_once __DIR__ . "/config/config.php";
    require_once __DIR__ . "/views/header.tpl.php";
    require_once __DIR__ . "/controllers/MainController.php";
    require_once __DIR__ . "/controllers/ErrorController.php";

    $routes = [
        '/' => [
            'controller' => 'MainController',
            'method' => 'home',
            'controller' => 'ErrorController',
            'method' => 'error'
        ]
    ];

    if (!empty($routes[$currentPage])) {
        $currentRoute = $routes[$currentPage];
        $controller = new $currentRoute['controller']();
        $method = $currentRoute['method'];
        $controller->$method();

    } else {
        $controller = new ErrorController();
        $controller->error404();
    }