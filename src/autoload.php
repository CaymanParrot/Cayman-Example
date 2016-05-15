<?php
/**
 * File for autoloading example application classes
 */

spl_autoload_register(
    function($className) {
        //error_log('loading ' . $className);
        $ds = DIRECTORY_SEPARATOR;
        if (substr($className, 0, 2) == 'My' || substr($className, 0, 3) == '\\My') {
            $className = str_replace('\\', $ds, $className);//  '\' ==> '/'
            $file = __DIR__ . $ds . $className . '.php';
            if (file_exists($file)) {
                require $file;
            }
        }
    }
);

// its composer setting is not good
require_once __DIR__ . '/../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
