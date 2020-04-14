<?php

// include the composer autoloader
require '../vendor/autoload.php';

// Load the config files
require_once 'config/config.php';

// Load the helper files
require_once 'Helper/estimator.php';


// autoload classes
spl_autoload_register(function ($className) {
    // class directories
    $dir = array(
        APP_ROOT,
        APP_ROOT . "/Libraries"
    );

    foreach ($dir as $path) {
        $file = sprintf("%s/%s.php", $path, $className);
        if (is_file($file)) {
            require_once($file);
        }
    }
});

