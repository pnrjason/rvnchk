<?php
    error_reporting(0);
    require "routes.php";

    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $method = $_SERVER['REQUEST_METHOD'];
    $baseURL = '/';

    if ($uri === '/') { header("Location: /dashboard"); exit; }

    if (str_ends_with($uri, '/')) {
        $uri = rtrim($uri, '/');
        header("Location: " . $uri);
        exit;
    }

    if (isset($routes[$method]) && array_key_exists($uri, $routes[$method])) {
        require $routes[$method][$uri];
    } else {
        http_response_code(404);
        require "views/error.php";
    }