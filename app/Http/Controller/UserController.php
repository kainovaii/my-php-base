<?php
namespace App\Http\Controller;

use App\Core\Controller;
use App\Core\Http\Request;
use App\Core\Http\Router\Route;
use App\Core\View;

class UserController extends Controller
{
    #[Route('/users/login', 'GET', 'default')]
    public function login(Request $_request): View
    {
        return $this->view('login', 'main');
    }

    #[Route('/users/account', 'GET', 'auth')]
    public function account(Request $_request): View
    {
        return $this->view('account', 'main');
    }
}