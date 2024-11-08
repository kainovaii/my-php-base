<?php

namespace App\Domain\Auth;

use Core\Http\Request;
use Core\Http\Service\Service;
use App\Domain\Auth\Exception\UserBannedException;

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
                    Service::get()->flash->error('Sorry incorect password !');
                    return false;
                }
            } else {
                throw new UserBannedException();
            }
        } else {
            Service::get()->flash->error('Sorry this account does not exist');
            return false;
        }    
    }

    public function signout(): bool
    {
        Service::get()->session->delete('user');
        return true;
    }
}
