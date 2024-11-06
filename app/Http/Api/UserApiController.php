<?php
namespace App\Http\Api;

use App\Core\Controller;
use App\Core\Http\Request;
use App\Core\Http\Router\Route;

class UserApiController extends Controller
{
    #[Route('/api/users/login', 'POST', 'default')]
    public function login(Request $_request): void
    {
        $req = $this->userService->authenticate($_request);
        if ($req) {$this->redirect('/users/account');}
    }

    #[Route('/api/users/logout', 'GET', 'auth')]
    public function logout(): void
    {
        $req = $this->userService->signout();
        if ($req) {$this->redirect('/users/login');}
    }
}