<?php

declare(strict_types=1);

namespace application\controllers;

use application\core\View;
use application\core\Controller;
use application\core\http\Request;

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
    public function index(Request $_request): View
    {
        return view('home');
    }

    public function contact(Request $_request): void
    {
        echo 'Message sent';
    }

    public function user(Request $_request): void
    {
        dump($_request->get_route_params("id"));
    }
}
