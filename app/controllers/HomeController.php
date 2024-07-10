<?php

declare(strict_types = 1);

namespace application\controllers;

use application\core\Controller;
use application\core\View;

/**
 * The HomeController class is responsible for handling the home page of the application.
 */
final class HomeController extends Controller 
{
    /**
     * The index method is the default action for the home page.
     * It returns a View object that renders the 'home' view.
     *
     * @return View The rendered home view.
     */
    public function index(): View
    {
        return view('home');
    }
}