<?php

namespace Core\Http\User;

use Core\Http\Service\Service;

class LoggedUser implements UserInterface {

    public function getRoles(): string
    {
        return Service::get()->session->get('user')->role;
    }

    public function getUser(): mixed
    {
        if ($this->isLogged())
        {
            return Service::get()->session->get('user');
        }
        return [];
    }

    public function getUserIdentifier(): string
    {
        if ($this->isLogged())
        {
            return Service::get()->session->get('user')->username;
        }
        return 'visitor';
    }

    public function isLogged(): bool
    {
        if (isset(Service::get()->session->get('user')->username)) { return true; }
        return false;
    }
}