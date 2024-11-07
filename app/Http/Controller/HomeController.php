<?php
namespace App\Http\Controller;

use Core\Controller;
use Core\Http\Request;
use Core\Http\Router\Route;
use Core\View;

class HomeController extends Controller
{
    #[Route('/', 'GET', 'default')]
    public function home(Request $_request): View
    {
        return $this->view('home', 'main', [
            'users' => $this->userRepository->getAll()
        ]);
    }
}