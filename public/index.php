<?php

use App\Core\Application;
use App\Http\Controller\HomeController;

define('ROOT_DIR', dirname(__DIR__));

require_once ROOT_DIR .
    DIRECTORY_SEPARATOR . 'vendor' .
    DIRECTORY_SEPARATOR . 'autoload.php';

$app = new Application();

$app->registerController($app, HomeController::class);

$app->run();