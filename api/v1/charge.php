<?php

    sleep(1);

    if (!str_starts_with($_SERVER['CONTENT_TYPE'], 'application/json')) {
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
            'card' => $input['data'],
            'message' => 'AP',
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
            'card' => $input['data'],
            'message' => 'CVV Declined',
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
            'card' => $input['data'],
            'message' => 'Error',
            'bin_data' => [
                'bin' => '400000',
                'brand' => 'VISA',
                'category' => 'DEBIT',
                'level' => 'CLASSIC',
                'bank' => 'EXAMPLE BANK INC',
                'country' => 'US',
            ],
        ];
    }

    echo json_encode($response);
    exit;