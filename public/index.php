<?php


use App\Core\Application;
use App\Http\Controller\HomeController;


define('ROOT_DIR', dirname(__DIR__));

require_once ROOT_DIR .
    DIRECTORY_SEPARATOR . 'vendor' .
    DIRECTORY_SEPARATOR . 'autoload.php';

$app = new Application();

$app->registerController($app, HomeController::class);

/*
$app->registerController($app, ContentController::class);
$app->registerController($app, ContentApiController::class);
$app->registerController($app, UserController::class);
$app->registerController($app, RoleApiController::class);
$app->registerController($app, RoleController::class);
$app->registerController($app, SettingController::class);
$app->registerController($app, FileController::class);
$app->registerController($app, DataModelApiController::class);
$app->registerController($app, DataModelController::class);
*/

$app->run();