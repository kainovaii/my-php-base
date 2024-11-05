<?php

namespace App\Core;

use App\Core\Http\Security\Security;
use App\Core\Http\Service\RegisterServiceContainer;
use App\Core\Http\User\LoggedUser;
use App\Core\Http\User\UserInterface;
use App\Core\View;
use Symfony\Component\Finder\Exception\AccessDeniedException;

abstract class Controller extends RegisterServiceContainer
{
    public function getUserOrThrow(): UserInterface
    {
        $user = new LoggedUser();

        if (!$user instanceof UserInterface)
        {
            throw new AccessDeniedException();
        }
        return $user;
    }

    function view(string $name, ?string $layout = null, array $params = []): View
{
    // If no layout is provided, use the main layout by default
    $layout = $layout ?? View::$MAIN_LAYOUT;

    // Create a new View object with the provided name, layout, and parameters
    return new View($name, $layout, $params);
}


    public static function isGranted(mixed $attribute, mixed $subject = null) {
        $security = new Security();
        if (!$security->authorizationChecker($attribute, $subject)) trigger_error('Access error'); 
    }

    public function getControllerReflector()
    {
        return new \ReflectionClass($this);
    }
}
