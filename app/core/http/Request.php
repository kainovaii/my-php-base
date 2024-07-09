<?php

declare(strict_types = 1);

namespace application\core\http;

/**
 * Represents an HTTP request received by the application.
 *
 * This class provides methods to retrieve information about the current request, such as
 * the request path and HTTP method.
 */
final class Request
{
    private const METHODS = ['get', 'post', 'put', 'patch', 'delete'];

    /**
     * Gets the path of the current request.
     *
     * This method extracts the path from the `$_SERVER['REQUEST_URI']` global variable,
     * removing any query string parameters that may be present.
     *
     * @return string The path of the current request.
     */
    public function get_path(): string
    {
        // Get the full request URI
        $path = $_SERVER['REQUEST_URI'];

        // Find the position of the query string (if any)
        $position = strpos($path, '?');

        // If there's no query string, return the full path
        // Otherwise, return the path up to the query string
        return $position ? substr($path, 0, $position) : $path;
    }

    /**
     * Gets the HTTP method of the current request.
     *
     * This method retrieves the HTTP method from the `$_SERVER['REQUEST_METHOD']` global
     * variable and converts it to lowercase.
     *
     * @return string The HTTP method of the current request.
     */
    public function get_method(): string
    {
        // Get the HTTP method from the global server variables and convert it to lowercase
        return strtolower($_POST['_method'] ?? $_SERVER['REQUEST_METHOD']);
    }

    public function methods(): array
    {
        return self::METHODS;
    }

    public static function method(string $method): void
    {
        $string = '<input type="hidden" name="_method" value="%s">';

        echo (array_search($method, self::METHODS) ? sprintf($string, $method) : null);
    }
}