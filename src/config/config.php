<?php

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(dirname(dirname(__DIR__)) . '/.env');


// App Root
define('APP_ROOT', dirname(dirname(__FILE__)));

//URL Root
define('URL_ROOT', $_ENV['URL_ROOT']);

// Site Name
define('SITE_NAME', $_ENV['SITE_NAME']);

