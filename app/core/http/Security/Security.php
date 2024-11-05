<?php

namespace App\Core\Http\Security;

use App\Core\Http\User\LoggedUser;
use App\Http\Security\ContentVoter;

class Security
{
    public static function authorizationChecker(mixed $attribute, mixed $subject = null): bool
    {
        $permission = new Permission();
        $user = new LoggedUser();

        $permission->addVoter(new ContentVoter());

        $req = $permission->can($user, $attribute, $subject);

        return $req;
    }
}
