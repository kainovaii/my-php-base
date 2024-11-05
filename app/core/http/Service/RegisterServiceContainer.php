<?php

namespace App\Core\Http\Service;

use App\Repository\User;

class RegisterServiceContainer {
    protected User $userRepository;
    
    public function __construct()
    {
        $container = new ServiceContainer();
        $this->userRepository = $container->get(User::class);
    }
}