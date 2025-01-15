<?php

    $routes = [
        'GET' => [
            '/dashboard' => 'views/dashboard.php',
            '/checker/auth' => 'views/checker/auth.php',
            '/checker/charge' => 'views/checker/charge.php',
            '/checker/3ds' => 'views/checker/3ds.php',
            '/checker/bin' => 'views/checker/bin.php',
        ],
        'POST' => [
            '/checker/process' => 'controllers/checker/process.php',
            '/contact/send' => 'controllers/contact/send.php',
        ],
    ];