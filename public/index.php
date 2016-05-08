<?php
/**
 * File for processing requests coming to the Frontend/Application
 */

/**
 * Define constant to mark the start time of application
 */
define('MY_APP_STARTED', microtime($get_as_float = true));

//load settings
$settingsArr = require __DIR__ . '/../.settings.php';
$version = $settingsArr['application']['version'];
header('location: /app/' . $version . '/index.html');