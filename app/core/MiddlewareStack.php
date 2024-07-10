<?php

declare(strict_types = 1);

namespace application\core;

final class MiddlewareStack  
{
    private array $middleware_stack = [];

    public function add($alias, string $middleware_class): void
    {
        $this->middleware_stack[$alias] = $middleware_class;
    }

    public static function has(string $middleware): Middleware | bool
    {
        return self::$middleware_stack[$middleware] ?? false;
    }
}
