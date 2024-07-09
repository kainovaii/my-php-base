<?php

declare(strict_types = 1);

namespace application\core;

final class MiddlewareStack  
{
    private array $middleware_stack = [];

    public function add($alias, string $middleware_class): void
    {
        $this->middleware_stack[$alias] = $middleware_class;

        dump($this->middleware_stack);
    }
}
