<?php
/**
 * File for autoloading example application classes
 */

spl_autoload_register(
    function($className) {
        $ds = DIRECTORY_SEPARATOR;
        if (substr($className, 0, 2) == 'My') {
            $className = str_replace('\\', $ds, $className);//  '\' ==> '/'
            $file = __DIR__ . $ds . $className . '.php';
            if (file_exists($file)) {
                require $file;
            }
        }
    }
);
