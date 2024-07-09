<?php

declare(strict_types = 1);

namespace application\core;

use application\core\exceptions\HTTPException;
use application\core\http\Response;
use Exception;

/**
 * The main application class that manages the routing and execution of the application.
 *
 * This class is responsible for initializing the Router object, setting the root directory
 * of the application, and running the application by resolving the appropriate action
 * based on the requested URL.
 */
final class Application
{
    /**
     * The Router object responsible for handling the application's routing.
     */
    public Router $router;

    public Response $response;

    /**
     * The root directory of the application.
     */
    public static $ROOT_DIR;

    /**
     * Constructs a new instance of the Application class.
     *
     * In the constructor, a new Router object is created and the root directory of the
     * application is set.
     */
    public function __construct()
    {
        // Create a new Router object
        $this->router = new Router();
        $this->response = new Response();

        // Set the root directory of the application
        self::$ROOT_DIR = dirname(__DIR__);
    }

    /**
     * Runs the application by resolving the appropriate action based on the requested URL.
     *
     * This method calls the `resolve()` method of the Router object, which returns the
     * appropriate action to be executed. The result of the action is then echoed to the
     * output.
     */
    public function run(): void
    {
        try {
            echo $this->router->resolve();
        } catch (Exception $exception) { $this->handle($exception); }
    }

    private function handle(Exception $exception): void
    {
        if (is_subclass_of($exception, HTTPException::class)) {
            $this->response->set_status_code($exception->getCode());
            echo view('error', 'main-error', $exception->parameters());
        }
    }
}