<?php

use Core\Http\Service\Service;
use Core\Http\User\LoggedUser;

function loggedUser(): LoggedUser
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