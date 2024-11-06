<?php
namespace App\Http\Controller;

use Core\Controller;
use Core\Http\Request;
use Core\Http\Router\Route;
use Core\Http\Service\RegisterServiceContainer;
use Core\View;
use App\Http\Security\ContentVoter;

class HomeController extends Controller
{
    #[Route('/', 'GET', 'default')]
    public function home(Request $_request): View
    {
        $this->isGranted(ContentVoter::READ);

        return $this->view('home', 'main', [
            'users' => $this->userRepository->getAll()
        ]);
    }
}