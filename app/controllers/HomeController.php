<?php

declare(strict_types = 1);

namespace application\controllers;

use application\core\Controller;
use application\core\View;

final class HomeController extends Controller 
{
    public function index(): View
    {
        return view('home');
    }
}
