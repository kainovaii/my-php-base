<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Core\Middleware;

final class DefaultMiddleware implements Middleware
{
    public function handle() : bool
    {
        return true;
    }
}
