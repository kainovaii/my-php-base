<?php

declare(strict_types=1);

namespace application\controllers;

use application\core\Controller;
use application\core\http\Request;
use application\core\View;

final class ContactController extends Controller
{
    public function index(Request $_request): View
    {
        return view('contact');
    }

    public function handle_data(Request $request): string
    {
        dump($request->get_body());

        return 'Handling submitted data';
    }

    public function handle_put_data(Request $_request): string
    {
        return 'Handling submitted data (put)';
    }
}
