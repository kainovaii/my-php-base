<?php

declare(strict_types = 1);

namespace application\middlewares;

use application\core\Middleware;

/**
 * The AuthenticationMiddleware class is responsible for handling the authentication process.
 * [Warning] The current implementation always returns true, which means that all requests are authenticated.
 * This is likely not the desired behavior, and the middleware should be implemented to properly
 * check the user's authentication status.
 */
final class AuthenticationMiddleware  implements Middleware
{
    /**
     * The handle method is called by the application to perform the authentication logic.
     * In the current implementation, it always returns true, which means that all requests are authenticated.
     *
     * @return bool Always returns true, which is likely not the desired behavior.
     */
    public function handle(): bool
    {
        return true;
    }
}