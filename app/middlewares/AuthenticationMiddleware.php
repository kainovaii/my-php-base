<?php

declare(strict_types = 1);

namespace application\middlewares;

use application\core\Middleware;

final class AuthenticationMiddleware  implements Middleware
{
    public function handle(): bool
    {
        return true;
    }
}
