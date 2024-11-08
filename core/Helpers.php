<?php

use Core\Http\Service\Service;
use Core\Http\User\UserInterface;
use Core\Session\Flash;

function loggedUser(): UserInterface
{
    return Service::get()->loggedUser;
}

function flashRender(): void
{
    if (isset($_SESSION['flash']))
    {
        echo Service::get()->flash->render();
        Service::get()->flash->clear(); 
    }
}