<?php

use application\core\Application;
use application\controllers\HomeController;
use application\middlewares\AuthenticationMiddleware;

// Define the root directory of the application
// This comment explains the purpose of the constant definition
define('ROOT_DIR', dirname(__DIR__));

// Include the Composer autoloader to load the application classes
// This is a standard step in PHP application setup
require_once ROOT_DIR . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

// Create a new instance of the Application class
$application = new Application();

// Add the authentication middleware to the list of middlewares
// This comment explains the purpose of adding the middleware
$application->middlewares->add('auth', AuthenticationMiddleware::class);

// Register a GET route for the root path ('/') that maps to the 'index' action
// of the 'HomeController'
// This comment explains the purpose of the route registration
$application->router->get('/', [HomeController::class, 'index']);

// Run the application
$application->run();