<?php

namespace App\Core\Http\Service;

class Service {
    public static function get(): mixed
    {
        return RegisterServiceContainer::get();
    }
}