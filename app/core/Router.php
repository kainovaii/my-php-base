<?php

declare(strict_types = 1);

namespace application\core;

use Exception;
use application\core\http\Request;
use application\core\http\exceptions\NotFoundException;
use application\core\http\exceptions\NotImplementedException;
use application\core\http\exceptions\MethodNotAllowedException;

/**
 * The Router class is responsible for handling the routing of the application.
 * It maps URL paths to their corresponding actions and resolves the appropriate response based on the requested path and HTTP method.
 *
 * The class provides methods to register routes for different HTTP methods (GET, POST, PUT, PATCH, DELETE) and also supports a wildcard "any" method
 * to register a route for all HTTP methods.
 *
 * The Router class also supports middleware, which can be associated with a specific route. The middleware is executed before the route action is called.
 * 
 * @method void get(string $path, string|callable|array $action, null|string $middleware = null)
 * @method void post(string $path, string|callable|array $action, null|string $middleware = null)
 * @method void put(string $path, string|callable|array $action, null|string $middleware = null)
 * @method void patch(string $path, string|callable|array $action, null|string $middleware = null)
 * @method void delete(string $path, string|callable|array $action, null|string $middleware = null)
 */
final class Router  
{
    private Request $request;

    /**
     * An associative array that stores the registered routes, organized by HTTP method.
     * The format is:
     * [
     *     'get' => [
     *         '/path' => $action,
     *         ...
     *     ],
     *     'post' => [
     *         '/path' => $action,
     *         ...
     *     ],
     *     ...
     * ]
     */
    private array $routes = [];

    /**
     * An associative array that stores the middleware associated with each registered route, organized by HTTP method.
     * The format is similar to the $routes array.
     */
    private array $middlewares = [];

    public function __construct()
    {
        $this->request = new Request();

        $this->init_routes();
    }

    /**
     * Initializes the $routes array, setting each HTTP method as a key with a null value.
     */
    private function init_routes(): void
    {
        foreach ($this->request->methods() as $method) $this->routes[$method] = null;
    }

    /**
     * Registers a route that will handle all HTTP methods (GET, POST, PUT, PATCH, DELETE).
     *
     * @param string $path The URL path to match.
     * @param callable|string|array $action The action to be executed when the route is matched.
     * @param null|string $middleware The middleware to be executed before the action.
     */
    public function any(string $path, callable | string | array $action, ?string $middleware = null): void
    {
        foreach ($this->request->methods() as $method) $this->add($method, $path, $action, $middleware);
    }

    /**
     * Adds a route to the $routes and $middlewares arrays.
     *
     * @param string $method The HTTP method (GET, POST, PUT, PATCH, DELETE) for the route.
     * @param string $path The URL path to match.
     * @param callable|string|array $action The action to be executed when the route is matched.
     * @param null|string $middleware The middleware to be executed before the action.
     */
    private function add(string $method, string $path, callable | string | array $action, ?string $middleware = null): void
    {
        $this->routes[$method][$path] = $action;
        $this->middlewares[$method][$path] = $middleware;
    }

    /**
     * Allows dynamic method calls to register routes for specific HTTP methods (GET, POST, PUT, PATCH, DELETE).
     *
     * @param string $name The name of the HTTP method (get, post, put, patch, delete).
     * @param array $arguments The arguments passed to the method (path, action, middleware).
     */
    public function __call($name, $arguments): void
    {
        array_key_exists($name, $this->routes) ? $this->add($name, ...$arguments) : throw new NotImplementedException();
    }

    /**
     * Resolves the appropriate action based on the requested path and HTTP method.
     *
     * If no matching route is found, a 404 response is returned.
     * If the requested HTTP method is not allowed for the requested path, a 405 response is returned.
     *
     * @return string|View The resolved action, which can be a string or a View object.
     */
    public function resolve(): string | View
    {
        $path = $this->request->get_path();
        $method = $this->request->get_method();

        $action = $this->routes[$method][$path] ?? false;
        $middleware = $this->middlewares[$method][$path] ?? null;

        if (!$action) {
            $routes = array_diff_key($this->routes, [$method => null]);

            foreach ($routes as $route) {
                foreach ($route as $key => $_value) {
                    if ($key === $path)
                        throw new MethodNotAllowedException();
                }
            }

            throw new NotFoundException();
        }

        // If the action is an array, create an instance of the first element (the controller class)
        if (is_array($action)) $action[0] = new $action[0]();

        // Execute the middleware if it exists
        $this->verify($middleware);

        // Execute the resolved action
        return is_string($action) ? view($action) : call_user_func($action);
    }

    /**
     * Verifies and executes the middleware associated with the current route.
     *
     * @param null|string $middleware The middleware to be executed.
     */
    private function verify(?string $middleware): void
    {
        $middleware_class = MiddlewareStack::has($middleware);

        if ($middleware_class) {
            $middleware_class = new $middleware_class();
            call_user_func([$middleware_class, 'handle']) ?: throw new Exception();
        }
    }
}