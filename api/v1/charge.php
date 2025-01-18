<?php

    sleep(3);

    if (strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== 0) {
        header('Content-Type: application/json');
        http_response_code(415);
        echo json_encode(['error' => 'Invalid Content-Type. Only application/json is allowed.']);
        exit;
    }

    $headers = array_change_key_case(getallheaders(), CASE_LOWER);
    $apiKey = $headers['api-key'] ?? null;

    if (empty($apiKey)) {
        header('Content-Type: application/json');
        http_response_code(401);
        echo json_encode(['error' => 'Missing API key.']);
        exit;
    }

    $validApiKey = 'your-secret-api-key';
    if ($apiKey !== $validApiKey) {
        header('Content-Type: application/json');
        http_response_code(403);
        echo json_encode(['error' => 'Invalid API key.']);
        exit;
    }

    header('Content-Type: application/json');
    $input = json_decode(file_get_contents('php://input'), true);

    if ($input['data'] == '4420632000063531|01|2026|123') {
        $response = [
            'status' => 'ok',
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
    } elseif (str_contains($input['data'], '4000000000000000|01|2028|123')) {
        $response = [
            'status' => 'nok',
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
    } else {
        $response = [
            'status' => 'error',
            'message' => 'An unknown error occurred. Please try again later.',
        ];
    }

    echo json_encode($response);
    exit;