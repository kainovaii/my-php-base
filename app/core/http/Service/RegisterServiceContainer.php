<?php

namespace App\Core\Http\Service;

use App\Domain\Auth\UserRepository;
use App\Domain\Auth\AuthService;
use App\Core\Session;

abstract class RegisterServiceContainer {
    protected UserRepository $userRepository;
    protected AuthService $userService;
    protected Session $session;
    private static $instance;
    
    public function __construct()
    {
        $container = new ServiceContainer();
        $this->userRepository = $container->get(UserRepository::class);
        $this->userService = $container->get(AuthService::class);
        $this->session = $container->get(Session::class);
    }
}