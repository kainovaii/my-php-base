<?php

namespace App\Core\Http\User;

class LoggedUser implements UserInterface {

    public function getRoles(): string
    {
        return $_SESSION['user']['role']['name'];
    }

    public function getUser(): mixed
    {
        if (isset($_SESSION['user']))
        {
            return $_SESSION['user'];
        } else {
            return [];
        }
    }

    public function getUserIdentifier(): string
    {
        return $_SESSION['user']->username;
    }

}