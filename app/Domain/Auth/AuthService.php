<?php

namespace App\Domain\Auth;

use App\Core\Http\Request;
use App\Core\Http\Service\Service;
use App\Domain\Auth\Exception\UserBannedException;
use App\Domain\Auth\Exception\UserNotFoundException;

class AuthService extends UserRepository {
    public function authenticate(Request $_resquest): bool
    {
        $email = (string) $_resquest->getBody()['email'];
        $password = (string) $_resquest->getBody()['password'];
        $user =  $this->getByEmail($email);
        if ($user)
        {
            if ($user->status >= 1)
            {
                if (password_verify($password, $user->password))
                {
                    Service::get()->session->set('user', $user);
                    return true;
                }
            } else {
                throw new UserBannedException();
            }
        } else {
            throw new UserNotFoundException(); 
        }
        return false;       
    }

    public function signout(): bool
    {
        unset($_SESSION['user']);
        return true;
    }
}
