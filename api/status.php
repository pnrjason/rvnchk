<?php

    header('Content-Type: application/json');
    $response = [
        'status' => 'OK',
        'ping' => (time() - $_SERVER['REQUEST_TIME']) * 1000 . "ms",
    ];

    echo json_encode($response);
    exit;