<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Core\Middleware;

final class AuthMiddleware implements Middleware
{
    public function handle() : bool
    {
        if (isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
        
    }
}