<?php

    header('Content-Type: application/json');

    $input = json_decode(file_get_contents('php://input'), true);
    // curl queries here

    // example response:
    $response = [
        'card' => '4000000000000000|01|2028|123',
        'message' => 'Approved',
        'bin_data' => [
            'bin' => '400000',
            'brand' => 'VISA',
            'category' => 'DEBIT',
            'level' => 'CLASSIC',
            'bank' => 'EXAMPLE BANK INC',
            'country' => 'US',
        ],
    ];

    echo json_encode($response);
    exit;