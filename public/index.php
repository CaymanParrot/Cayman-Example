<?php
/**
 * File for processing requests coming to the application
 */

/**
 * Define constant to mark the start time of application
 */
define('MY_APP_STARTED', microtime($get_as_float = true));

try {
    require __DIR__ . '/../src/http.php';
} catch (Exception $ex) {
    header('content-type: application/json; charset=utf-8');
    $response = [
        'status' => 'error',
        'meta'   => [],
        'errors' => [$ex->getMessage()],
    ];
    define('MY_APP_ENDED', microtime($get_as_float = true));
    $response['meta']['time'] = number_format(MY_APP_ENDED - MY_APP_STARTED, 6);
    echo json_encode($response);
}

