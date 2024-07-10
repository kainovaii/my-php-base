<?php

use application\core\Application;
use application\controllers\HomeController;
use application\middlewares\AuthenticationMiddleware;

// Define the root directory of the application
define('ROOT_DIR', dirname(__DIR__));

// Include the Composer autoloader to load the application classes
require_once ROOT_DIR .
             DIRECTORY_SEPARATOR . 'vendor' .
             DIRECTORY_SEPARATOR . 'autoload.php';

// Create a new instance of the Application class
$application = new Application();

$application->middlewares->add('auth', AuthenticationMiddleware::class);

// Register a GET route for the root path ('/') that maps to the 'home' action
$application->router->get('/', [HomeController::class, 'index']);

// Run the application
$application->run();