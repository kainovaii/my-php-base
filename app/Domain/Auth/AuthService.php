<?php

namespace App\Domain\Auth;

use App\Domain\Auth\Exception\IncorectPasswordException;
use Core\Http\Request;
use Core\Http\Service\Service;
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
                } else {
                    throw new IncorectPasswordException();
                }
            } else {
                throw new UserBannedException();
            }
        } else {
            throw new UserNotFoundException(); 
        }    
    }

    public function signout(): bool
    {
        Service::get()->session->delete('user');
        return true;
    }
}
