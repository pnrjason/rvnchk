<?php

    // Temporary routes

    $routes = [
        'GET' => [
            '/dashboard' => 'views/dashboard.php',
            '/checker/auth' => 'views/checker/auth.php',
            '/checker/charge' => 'views/checker/charge.php',
            '/checker/3ds' => 'views/checker/3ds.php',
            '/checker/bin' => 'views/checker/bin.php',
        ],
        'POST' => [
            '/checker/auth' => 'controllers/checker/auth.php',
            '/checker/charge' => 'controllers/checker/charge.php',
            '/checker/3ds' => 'controllers/checker/3ds.php',
            '/checker/bin' => 'controllers/checker/bin.php',
        ],
    ];