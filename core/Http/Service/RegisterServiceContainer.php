<?php

namespace Core\Http\Service;

use App\Domain\Blog\BlogRepository;
use App\Domain\Blog\BlogService;
use Core\Http\User\LoggedUser;
use Core\Http\User\UserInterface;
use App\Domain\Auth\UserRepository;
use App\Domain\Auth\AuthService;
use Core\Http\Service\ServiceContainer;
use Core\Session\Flash;
use Core\Session\SessionManager;
use Core\Http\Listener\EventDispatcher;
use Core\Http\Listener\ListenerProvider;
use App\Domain\Blog\Event\BlogCreateEvent;
use App\Domain\Blog\Event\BlogListener;

class RegisterServiceContainer {
    public UserRepository $userRepository;
    public AuthService $userService;
    public SessionManager $session;
    public Flash $flash;
    public UserInterface $loggedUser;
    public BlogRepository $blogRepository;
    public BlogService $blog;
    public static array $_instance = [];
    
    public function __construct()
    {
        $this->registerService();
    }

    public function registerService(): void
    {
        $container = new ServiceContainer();
        $this->userRepository = $container->get(UserRepository::class);
        $this->userService = $container->get(AuthService::class);
        $this->session = $container->get(SessionManager::class);
        $this->flash = $container->get(Flash::class);
        $this->loggedUser = $container->get(LoggedUser::class);
        $this->blogRepository = $container->get(BlogRepository::class);
        $this->blog = $container->get(BlogService::class);
    }

    public static function get(): mixed
    {
        $class = get_called_class();

        if(!isset(self::$_instance[$class]))
        {
            self::$_instance[$class] = new $class;
        }

        return self::$_instance[$class];
    }
}