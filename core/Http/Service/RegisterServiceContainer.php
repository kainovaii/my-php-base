<?php

namespace Core\Http\Service;

use Core\Http\User\LoggedUser;
use Core\Http\User\UserInterface;
use App\Domain\Auth\UserRepository;
use App\Domain\Auth\AuthService;
use Core\Http\Service\ServiceContainer;
use Core\Session;

class RegisterServiceContainer {
    public UserRepository $userRepository;
    public AuthService $userService;
    public Session $session;
    public UserInterface $loggedUser;

    public static array $_instance = [];
    
    public function __construct()
    {
        $this->register();
    }

    public function register()
    {
        $container = new ServiceContainer();
        $this->userRepository = $container->get(UserRepository::class);
        $this->userService = $container->get(AuthService::class);
        $this->session = $container->get(Session::class);
        $this->loggedUser = $container->get(LoggedUser::class);
    }

    public static function get()
    {
        $class = get_called_class();

        if(!isset(self::$_instance[$class]))
        {
            self::$_instance[$class] = new $class;
        }

        return self::$_instance[$class];
    }
}