<?php

    // Temporary routes

    $routes = [
        'GET' => [
            '/dashboard' => 'views/dashboard.php',
            '/checker/auth' => 'views/checker/auth.php',
            '/checker/charge' => 'views/checker/charge.php',
            '/checker/3ds' => 'views/checker/3ds.php',
            '/checker/bin' => 'views/checker/bin.php',
            '/api/status' => 'api/status.php',
        ],
        'POST' => [
            '/auth/login' => 'controllers/auth/login.php',
            '/api/v1/auth' => 'api/v1/auth.php',
            '/api/v1/charge' => 'api/v1/charge.php',
            '/api/v1/3ds' => 'api/v1/3ds.php',
            '/api/v1/bin' => 'api/v1/bin.php',
        ],
    ];