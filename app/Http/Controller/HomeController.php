<?php
namespace App\Http\Controller;

use App\Core\Controller;
use App\Core\Http\Request;
use App\Core\Http\Router\Route;
use App\Core\View;
use App\Http\Security\ContentVoter;

class HomeController extends Controller
{
    #[Route('/', 'GET')]
    public function test(Request $_request): View
    {
        $this->isGranted(ContentVoter::READ);

        return $this->view('home', 'main', [
            'users' => $this->userRepository->getAll()
        ]);
    }
}