<?php

namespace Core\Http\Security;

use App\Http\Security\BlogVoter;
use App\Http\Security\ContentVoter;
use Core\Http\User\LoggedUser;

class Security
{
    public static function authorizationChecker(mixed $attribute, mixed $subject = null): bool
    {
        $permission = new Permission();
        $user = new LoggedUser();

        $permission->addVoter(new BlogVoter());

        $req = $permission->can($user, $attribute, $subject);

        return $req;
    }
}
