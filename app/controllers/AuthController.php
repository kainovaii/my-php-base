<?php

declare(strict_types=1);

namespace application\controllers;

use application\core\Controller;
use application\core\http\Request;
use application\core\View;

final class AuthController extends Controller
{
    public function login(Request $_request): View
    {
        return view('login');
    }

    public function register(Request $_request): View
    {
        return view('register');
    }
}
