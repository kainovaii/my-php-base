<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Core\Http\Middleware\MiddlewareInterface;
use Core\Http\Service\Service;

final class AuthMiddleware implements MiddlewareInterface
{
    public function handle(): bool
    {
        if(!loggedUser()->isLogged()) {
            ob_start();
            header("location: /users/login");
            exit();
        }
        return true;
    }
}
