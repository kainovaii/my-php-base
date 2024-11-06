<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Core\Http\Service\Service;
use Core\Middleware;

final class AuthMiddleware implements Middleware
{
    public function handle() : bool
    {
        if(!Service::get()->loggedUser->isLogged()) {
            ob_start();
            header("location: /users/login");
            exit();
        }
        return true;
    }
}
