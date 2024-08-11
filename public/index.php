<?php

declare(strict_types=1);

use application\controllers\ContactController;
use application\core\Application;
use application\controllers\HomeController;
use application\middlewares\AdministratorMiddleware;
use application\middlewares\AuthenticationMiddleware;

// Define the root directory of the application
define('ROOT_DIR', dirname(__DIR__));

// Include the Composer autoloader to load the application classes
// This is a standard step in PHP application setup
require_once ROOT_DIR .
    DIRECTORY_SEPARATOR . 'vendor' .
    DIRECTORY_SEPARATOR . 'autoload.php';

// Create a new instance of the Application class
$application = new Application();

// Add the authentication middleware to the list of middlewares
$application->middlewares->add('auth', AuthenticationMiddleware::class);
$application->middlewares->add('admin', AdministratorMiddleware::class);

// Register a GET route for the root path ('/') that maps to the 'index' action
// of the 'HomeController'. The 'auth' and 'admin' middlewares are applied to this route.
$application->router->get('/', [HomeController::class, 'index'], ['auth', 'admin']);

// Run the application
$application->run();
