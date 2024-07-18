<?php

declare(strict_types = 1);

namespace application\middlewares;

use application\core\Middleware;

final class AdministratorMiddleware  implements Middleware
{
    public function handle(): bool
    {
        return true;
    }
}
