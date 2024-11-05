<?php

namespace App\Core\Http\Router;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class Route {

    public function __construct(private string $route, private string $method)
    {
     /**
      * Code
      */
    }

    public function getRoute(): string
    {
        return $this->route;
    }

    public function getMethod(): string
    {
        return $this->method;
    }
}   