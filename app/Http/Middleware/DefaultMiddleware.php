<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Core\Http\Middleware\MiddlewareInterface;

final class DefaultMiddleware implements MiddlewareInterface
{
    public function handle() : bool
    {
        return true;
    }
}
