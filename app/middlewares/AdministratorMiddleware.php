<?php

declare(strict_types=1);

namespace application\middlewares;

use application\core\Middleware;

/**
 * The AdministratorMiddleware class is a middleware that checks whether the current user has administrator privileges.
 * If the user is an administrator, the middleware returns true, allowing the request to proceed.
 */
final class AdministratorMiddleware implements Middleware
{
    /**
     * Checks whether the current user has administrator privileges.
     * This implementation always returns true, but in a real application, this method would check the user's role or permissions.
     *
     * @return bool True if the user is an administrator, false otherwise.
     */
    public function handle(): bool
    {
        // In a real application, this method would check the user's role or permissions
        // and return true if the user is an administrator, false otherwise.
        return true;
    }
}