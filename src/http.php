<?php
/**
 * File for starting the HTTP app
 */

// autoload via composer esp. if you depend on other vendors
//require __DIR__ . '/../vendor/autoload.php';

// or DIY via simple autoloader functions
require __DIR__ . '/autoload.php';
require __DIR__ . '/../vendor/caymanparrot/cayman/src/autoload.php';//simple cayman autoloader

$settingsArr = require __DIR__ . '/../.settings.php';

$settings = new My\Settings($settingsArr);

//load application object
$app = new My\Application\HttpApplication();
$app->setSettings($settings);

//load input
$inputRaw = $_REQUEST;//default input
$method   = strtolower($_SERVER['REQUEST_METHOD']);
if (in_array($method, ['post', 'put'])) {
    $contentType = explode(';', $_SERVER['CONTENT_TYPE']);
    if (in_array('application/json', $contentType)) {
        $inputJson = file_get_contents('php://input');
        $inputRaw  = json_decode($inputJson, true); //convert JSON into array
    }
}
if (empty($inputRaw)) {
    $inputRaw = [];
}
//load input object
$input = $app->loadInput($_SERVER, $inputRaw);

//run application with input
$output = $app->run($input);

//send response headers
//foreach($response->headers as $key => $value) {
//    header(sprintf('%s: %s', $key, $value));
//}

$output->setInput($input);

define('MY_APP_ENDED', microtime($get_as_float = true));
$output->appendMeta(number_format(MY_APP_ENDED - MY_APP_STARTED, 6), 'time');
$output->appendMeta(memory_get_peak_usage($real_usage = true)/1024, 'memory_kb');

header('content-type: application/json; charset=utf-8');

//send response body
echo json_encode($output->toArray());
