<?php

    require "routes.php";

    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $method = $_SERVER['REQUEST_METHOD'];
    $baseURL = '/';

    if ($uri === '/') { header("Location: /dashboard"); exit; }

    if (substr($uri, -1) == '/') {
        $uri = rtrim($uri, '/');
        header("Location: " . $uri);
        exit;
    }

    if (isset($routes[$method]) && array_key_exists($uri, $routes[$method])) {
        require $routes[$method][$uri];
    } else {
        http_response_code(404);
        require "views/404.php";
    }