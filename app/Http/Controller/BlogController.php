<?php
namespace App\Http\Controller;

use App\Http\Security\BlogVoter;
use Core\Controller;
use Core\Http\Request;
use Core\Http\Router\Route;
use Core\View;

class BlogController extends Controller
{
    #[Route('/blog', 'GET', 'default')]
    public function home(Request $_request): View
    {
        $query = $this->blogRepository->getAll();

        return $this->view('blog/home', 'main', [
            'articles' => $query
        ]);
    }

    #[Route('/blog/{id}', 'GET', 'default')]
    public function show(Request $_request): View
    {
        $query = $this->blogRepository->getSingle($_request->getParams('id'));

        $this->isGranted(BlogVoter::READ);
        return $this->view('blog/show', 'main', [
            'article' => $query
        ]);
    }

    #[Route('/blog/{id}/edit', 'GET', 'auth')]
    public function edit(Request $_request): View
    {
        $query = $this->blogRepository->getSingle($_request->getParams('id'));

        $this->isGranted(BlogVoter::EDIT, $query);
        return $this->view('blog/edit', 'main', [
            'article' => $query
        ]);
    }

    #[Route('/blog/create', 'GET', 'auth')]
    public function create(Request $_request): View
    {
        return $this->view('blog/create', 'main');
    }
}