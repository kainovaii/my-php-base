<?php

declare(strict_types = 1);

namespace application\core;

use application\core\http\exceptions\MethodNotAllowedException;
use application\core\http\Request;
use application\core\http\exceptions\NotFoundException;
use application\core\http\exceptions\NotImplementedException;

/**
 * Handles the routing of the application.
 *
 * This class is responsible for mapping URL paths to their corresponding actions,
 * and resolving the appropriate response based on the requested path and HTTP method.
 *
 * @method void get(string $path, string|callable $action)
 * @method void post(string $path, string|callable $action)
 * @method void put(string $path, string|callable $action)
 * @method void patch(string $path, string|callable $action)
 * @method void delete(string $path, string|callable $action)
 */
final class Router  
{
    private Request $request;

    /**
     * An array of registered routes, organized by HTTP method.
     *
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

    public function __construct()
    {
        $this->request = new Request();

        $this->init_routes();
    }

    private function init_routes(): void
    {
        foreach ($this->request->methods() as $method) $this->routes[$method] = null;
    }

    public function any(string $path, callable | string $action): void
    {
        foreach ($this->request->methods() as $method) $this->add($method, $path, $action);
    }

    private function add(string $method, string $path, mixed $action): void
    {
        $this->routes[$method][$path] = $action;
    }

    public function __call($name, $arguments): void
    {
        array_key_exists($name, $this->routes) ? $this->add($name, ...$arguments) : throw new NotImplementedException();
    }

    /**
     * Resolves the appropriate action based on the requested path and HTTP method.
     *
     * If no matching route is found, a 404 response is returned.
     *
     * @return string|View The resolved action, which can be a string or a View object.
     */
    public function resolve(): string | View
    {
        $path = $this->request->get_path();
        $method = $this->request->get_method();
        $action = $this->routes[$method][$path] ?? false;

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

        return is_string($action) ? view($action) : call_user_func($action);
    }
}