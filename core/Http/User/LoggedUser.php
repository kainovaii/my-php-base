<?php

namespace Core\Http\User;

use Core\Http\Service\Service;

class LoggedUser implements UserInterface {

    public function getRoles(): string
    {
        if ($this->isLogged())
        {
            return Service::get()->session->get('user')->role;
        }
        return 'visitor';
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

    /**
     * 
     * User
     */
    public function isLogged(): bool
    {
        if (isset(Service::get()->session->get('user')->username)) { return true; }
        return false;
    }
}